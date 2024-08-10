<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PatientModel;
use App\Models\DoctorModel;
use App\Models\PartnerModel;
use App\Libraries\PatientServiceFacade;

class RegisterController extends BaseController
{

    public function registerPatient()
    {
        //echo $result = MyServiceFacade::doSomething();
        if ($this->request->getMethod() == 'POST') {
            //echo '<pre>';print_r($_POST);die;
            // Validate reCAPTCHA
            $recaptchaResponse = $this->request->getVar('g-recaptcha-response');
            $isValidCaptcha = $this->validateRecaptcha($recaptchaResponse);

            if (!$isValidCaptcha) {
                // reCAPTCHA validation failed
                $errors = ['recaptcha' => 'Please complete the reCAPTCHA.'];
                return view('auth/registerPatient', [
                    'validation'   => \Config\Services::validation(),
                    'errors'       => $errors,
                    'countryCodes' => get_country_code_list(),
                    'timeZones'    => get_time_zones()
                ]);
            }
            //let's do the validation here
            $validation = \Config\Services::validation();

            $validation->setRules([
                'first_name' => [
                    'label' => 'First Name',
                    'rules' => 'required|alpha_space|min_length[2]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'alpha_space' => 'The {field} can only contain alphabetical characters and spaces.',
                        'min_length' => 'The {field} must be at least {param} characters long.'
                    ]
                ],
                'last_name' => [
                    'label' => 'Last Name',
                    'rules' => 'required|alpha_space|min_length[2]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'alpha_space' => 'The {field} can only contain alphabetical characters and spaces.',
                        'min_length' => 'The {field} must be at least {param} characters long.'
                    ]
                ],
                'dob' => [
                    'label' => 'DOB',
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'valid_date' => 'The {field} must be in a valid date format (DD-MM-YYYY).'
                    ]
                ],
                'email' => [
                    'label' => 'Email Address',
                    'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[drs_patients.email]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.',
                        'valid_email' => 'The {field} must be a valid email address.',
                        'is_unique' => 'The email address already used.'
                    ]
                ],
                'gender' => [
                    'label' => 'Gender',
                    'rules' => 'required|validate_gender[Male,Female,Other]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'validate_gender' => '{field} should be Male, Female, Other.'
                    ]
                ],
                'country_code' => [
                    'label' => 'Country Code',
                    'rules' => 'required|min_length[1]|max_length[3]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'phone' => [
                    'label' => 'Phone',
                    'rules' => 'required|numeric|min_length[10]|max_length[10]|is_unique[drs_patients.phone]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'time_zone' => [
                    'label' => 'Time Zone',
                    'rules' => 'required|min_length[1]|max_length[2]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]|max_length[255]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'confirm_password' => [
                    'label' => 'Confirm Password',
                    'rules' => 'matches[password]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'matches' => 'The {field} must match the Password.'
                    ]
                ],
                'is_terms_of_use' => [
                    'label' => 'Terms of Use',
                    'rules' => 'required|min_length[1]|max_length[1]',
                    'errors' => [
                        'required' => 'You must agree to the {field}.',
                        'min_length' => 'The {field} must be at least {param} character long.',
                        'max_length' => 'The {field} must not exceed {param} character.'
                    ]
                ]
            ]);

            if (!$validation->run($this->request->getPost())) {
                $errors = $validation->getErrors();
                return view('auth/registerPatient', [
                    'validation'   => $validation,
                    'errors'       => $errors,
                    'countryCodes' => get_country_code_list(),
                    'timeZones'    => get_time_zones()
                ]);
            } else {
                $model = new PatientModel();
                $firstName = $this->request->getVar('first_name');
                $firstName = ucfirst(strtolower($firstName));
                $lastName = $this->request->getVar('last_name');
                $lastName = ucfirst(strtolower($lastName));
                $email     = $this->request->getVar('email');
                //$prefixForUrlName   = sanitize_string(strtolower($firstName));
                $countryCode        = get_country_code($this->request->getVar('country_code'));
                $phone = $this->request->getVar('phone');
                $otp = rand(1000, 9999); // Generate a random 4-digit OTP
                helper('twilio');
                $send_status = send_otp($countryCode . $phone, $otp);

                if ($send_status) {

                    $newData = [
                        'member_id'       => generate_unique_member_id('drs_patients'),
                        'first_name'      => $firstName,
                        'last_name'       => $lastName,
                        'dob'             => $this->request->getVar('dob'),
                        'gender'          => $this->request->getVar('gender'),
                        'country_code'    => get_country_code($this->request->getVar('country_code')),
                        'country_id'      => $this->request->getVar('country_code'),
                        'phone'           => $this->request->getVar('phone'),
                        'otp'             => $otp,
                        'email'           => $this->request->getVar('email'),
                        'time_zone'       => $this->request->getVar('time_zone'),
                        'is_terms_of_use' => $this->request->getVar('is_terms_of_use'),
                        'password'        => $this->request->getVar('password'),
                        'created_at'      => date('Y-m-d')
                    ];
                    $model->save($newData);
                    $session = session();
                    session()->set([
                        'phone' => $phone,
                        'email' => $email,
                        'otp_screen_patient' => true,
                    ]);
                    $session->setFlashdata('success', 'Congratulations, you have successfully registered as a patient! Please check your phone for the OTP.');
                    return redirect()->to(base_url('verify-otp-patient'));
                } else {
                    $session = session();
                    $session->setFlashdata('error', 'Failed to send OTP. Please try again.');
                    return redirect()->back()->withInput();
                }


                // $model->save($newData);
                // $session = session();
                // $session->setFlashdata('success', 'Congratulations, you have successfully registered as a patient!');
                // return redirect()->to(base_url('login'));
            }
        }
        $data['countryCodes'] = get_country_code_list();
        $data['timeZones']    = get_time_zones();
        $this->setPageTitle('Patient Registration');
        $data['pageTitle']    = $this->getPageTitle();
        return view("auth/registerPatient", $data);
    }
    public function registerDoctor()
    {
        if ($this->request->getMethod() == 'POST') {
            //echo '<pre>';print_r($_POST);die;
            // Validate reCAPTCHA
            $recaptchaResponse = $this->request->getVar('g-recaptcha-response');
            $isValidCaptcha = $this->validateRecaptcha($recaptchaResponse);

            if (!$isValidCaptcha) {
                // reCAPTCHA validation failed
                $errors = ['recaptcha' => 'Please complete the reCAPTCHA.'];
                return view('auth/registerDoctor', [
                    'validation'   => \Config\Services::validation(),
                    'errors'       => $errors,
                    'countryCodes' => get_country_code_list(),
                    'timeZones'    => get_time_zones()
                ]);
            }
            //let's do the validation here
            $validation = \Config\Services::validation();

            $validation->setRules([
                'first_name' => [
                    'label' => 'First Name',
                    'rules' => 'required|alpha_space|min_length[2]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'alpha_space' => 'The {field} can only contain alphabetical characters and spaces.',
                        'min_length' => 'The {field} must be at least {param} characters long.'
                    ]
                ],
                'last_name' => [
                    'label' => 'Last Name',
                    'rules' => 'required|alpha_space|min_length[2]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'alpha_space' => 'The {field} can only contain alphabetical characters and spaces.',
                        'min_length' => 'The {field} must be at least {param} characters long.'
                    ]
                ],
                'dob' => [
                    'label' => 'DOB',
                    'rules' => 'required|valid_date[Y-m-d]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'valid_date' => 'The {field} must be in a valid date format (DD-MM-YYYY).'
                    ]
                ],
                'email' => [
                    'label'  => 'Email Address',
                    'rules'  => 'required|min_length[6]|max_length[50]|valid_email|is_unique[drs_doctors.email]',
                    'errors' => [
                        'required'   => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.',
                        'valid_email' => 'The {field} must be a valid email address.',
                        'is_unique'  => 'The email address already used.'
                    ]
                ],
                'license_number' => [
                    'label'  => 'License Number',
                    'rules'  => 'required|min_length[6]|max_length[20]',
                    'errors' => [
                        'required'   => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'country_code' => [
                    'label' => 'Country Code',
                    'rules' => 'required|min_length[1]|max_length[3]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'phone' => [
                    'label' => 'Phone',
                    'rules' => 'required|numeric|min_length[10]|max_length[10]|is_unique[drs_doctors.phone]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'time_zone' => [
                    'label' => 'Time Zone',
                    'rules' => 'required|min_length[1]|max_length[2]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]|max_length[255]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'confirm_password' => [
                    'label' => 'Confirm Password',
                    'rules' => 'matches[password]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'matches' => 'The {field} must match the Password.'
                    ]
                ],
                'is_terms_of_use' => [
                    'label' => 'Terms of Use',
                    'rules' => 'required|min_length[1]|max_length[1]',
                    'errors' => [
                        'required' => 'You must agree to the {field}.',
                        'min_length' => 'The {field} must be at least {param} character long.',
                        'max_length' => 'The {field} must not exceed {param} character.'
                    ]
                ]
            ]);

            if (!$validation->run($this->request->getPost())) {
                $errors = $validation->getErrors();
                return view('auth/registerDoctor', [
                    'validation'   => $validation,
                    'errors'       => $errors,
                    'countryCodes' => get_country_code_list(),
                    'timeZones'    => get_time_zones()
                ]);
            } else {
                $model = new DoctorModel();
                $firstName = $this->request->getVar('first_name');
                $firstName = ucfirst(strtolower($firstName));
                $lastName  = $this->request->getVar('last_name');
                $lastName  = ucfirst(strtolower($lastName));
                $email     = $this->request->getVar('email');
                $prefixForUrlName   = sanitize_string(strtolower($firstName));
                $countryCode        = get_country_code($this->request->getVar('country_code'));
                $phone = $this->request->getVar('phone');
                $otp = rand(1000, 9999); // Generate a random 4-digit OTP
                helper('twilio');
                $send_status = send_otp($countryCode . $phone, $otp);

                if ($send_status) {

                    $newData = [
                        'member_id'       => generate_unique_member_id('drs_doctors'),
                        'first_name'      => $firstName,
                        'last_name'       => $lastName,
                        'doctor_url_name' => $prefixForUrlName,
                        'dob'             => $this->request->getVar('dob'),
                        'license_number'  => $this->request->getVar('license_number'),
                        'country_code'    => get_country_code($this->request->getVar('country_code')),
                        'country_id'      => $this->request->getVar('country_code'),
                        'phone'           => $this->request->getVar('phone'),
                        'otp'             => $otp,
                        'email'           => $email,
                        'time_zone'       => $this->request->getVar('time_zone'),
                        'is_terms_of_use' => $this->request->getVar('is_terms_of_use'),
                        'password'        => $this->request->getVar('password'),
                        'created_at'      => date('Y-m-d')
                    ];

                    //$model->save($newData);
                    //$lastQuery = $model->getLastQuery();
                    // echo $lastQuery;die;

                    $model->save($newData);
                    $session = session();
                    session()->set([
                        'phone' => $phone,
                        'email' => $email,
                        'otp_screen_doctor' => true,
                    ]);
                    $session->setFlashdata('success', 'Congratulations, you have successfully registered as a doctor! Please check your phone for the OTP.');
                    return redirect()->to(base_url('verify-otp-doctor'));
                    //return redirect()->to(base_url('login'));
                } else {
                    $session = session();
                    $session->setFlashdata('error', 'Failed to send OTP. Please try again.');
                    return redirect()->back()->withInput();
                }

                // echo '<pre>';print_r($newData);die;
                // $session = session();
                // $session->setFlashdata('success', 'Congratulations, you have successfully registered as a doctor!');
                // return redirect()->to(base_url('login'));
            }
        }
        $data['countryCodes'] = get_country_code_list();
        $data['timeZones']    = get_time_zones();
        $this->setPageTitle('Doctor Registration');
        $data['pageTitle']    = $this->getPageTitle();
        return view("auth/registerDoctor", $data);
    }

    public function registerPartner()
    {

        if ($this->request->getMethod() == 'POST') {
            //echo '<pre>';print_r($_POST);die;
            // Validate reCAPTCHA
            $recaptchaResponse = $this->request->getVar('g-recaptcha-response');
            $isValidCaptcha = $this->validateRecaptcha($recaptchaResponse);

            if (!$isValidCaptcha) {
                // reCAPTCHA validation failed
                $errors = ['recaptcha' => 'Please complete the reCAPTCHA.'];
                return view('auth/registerPartner', [
                    'validation'   => \Config\Services::validation(),
                    'errors'       => $errors,
                    'countryCodes' => get_country_code_list(),
                    'timeZones'    => get_time_zones()
                ]);
            }
            //let's do the validation here
            $validation = \Config\Services::validation();

            $validation->setRules([
                'company_name' => [
                    'label' => 'Company Name',
                    'rules' => 'required|alpha_space|min_length[5]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'alpha_space' => 'The {field} can only contain alphabetical characters and spaces.',
                        'min_length' => 'The {field} must be at least {param} characters long.'
                    ]
                ],
                'company_contact_name' => [
                    'label' => 'Company Contact Name',
                    'rules' => 'required|alpha_space|min_length[5]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'alpha_space' => 'The {field} can only contain alphabetical characters and spaces.',
                        'min_length' => 'The {field} must be at least {param} characters long.'
                    ]
                ],
                'email' => [
                    'label'  => 'Email Address',
                    'rules'  => 'required|min_length[6]|max_length[50]|valid_email|is_unique[drs_partners.email]',
                    'errors' => [
                        'required'   => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.',
                        'valid_email' => 'The {field} must be a valid email address.',
                        'is_unique'  => 'The email address already used.'
                    ]
                ],
                'gst_number' => [
                    'label'  => 'GST Number',
                    'rules'  => 'required|min_length[6]|max_length[20]',
                    'errors' => [
                        'required'   => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'country_code' => [
                    'label' => 'Country Code',
                    'rules' => 'required|min_length[1]|max_length[3]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'phone' => [
                    'label' => 'Phone',
                    'rules' => 'required|numeric|min_length[10]|max_length[10]|is_unique[drs_partners.phone]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.',
                        'is_unique'  => 'The phone number already used.'
                    ]
                ],
                'time_zone' => [
                    'label' => 'Time Zone',
                    'rules' => 'required|min_length[1]|max_length[2]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'pan_number' => [
                    'label' => 'Pan Number',
                    'rules' => 'required|alpha_numeric|min_length[10]|max_length[20]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]|max_length[255]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'confirm_password' => [
                    'label' => 'Confirm Password',
                    'rules' => 'matches[password]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'matches' => 'The {field} must match the Password.'
                    ]
                ],
                'is_terms_of_use' => [
                    'label' => 'Terms of Use',
                    'rules' => 'required|min_length[1]|max_length[1]',
                    'errors' => [
                        'required' => 'You must agree to the {field}.',
                        'min_length' => 'The {field} must be at least {param} character long.',
                        'max_length' => 'The {field} must not exceed {param} character.'
                    ]
                ]
            ]);

            if (!$validation->run($this->request->getPost())) {
                $errors = $validation->getErrors();
                return view('auth/registerPartner', [
                    'validation'   => $validation,
                    'errors'       => $errors,
                    'countryCodes' => get_country_code_list(),
                    'timeZones'    => get_time_zones()
                ]);
            } else {

                $model = new PartnerModel();
                $companyName = $this->request->getVar('company_name');
                $companyName = ucfirst(strtolower($companyName));
                $companyContactName = $this->request->getVar('company_contact_name');
                $companyContactName = ucfirst(strtolower($companyContactName));
                $prefixForUrlName   = sanitize_string(strtolower($companyContactName));
                $countryCode        = get_country_code($this->request->getVar('country_code'));
                $phone = $this->request->getVar('phone');
                $otp = rand(1000, 9999); // Generate a random 4-digit OTP
                helper('twilio');
                $send_status = send_otp($countryCode . $phone, $otp);
                if ($send_status) {
                    $newData = [
                        'member_id'       => generate_unique_member_id('drs_partners'),
                        'company_name'    => $companyName,
                        'company_contact_name' => $companyContactName,
                        'company_url_name' => generate_incrementing_value('drs_partners', 'company_url_name', $prefixForUrlName),
                        'gst_number'      => $this->request->getVar('gst_number'),
                        'pan_number'      => $this->request->getVar('pan_number'),
                        'country_code'    => $countryCode,
                        'country_id'      => $this->request->getVar('country_code'),
                        'phone'           => $phone,
                        'otp'             => $otp,
                        'email'           => $this->request->getVar('email'),
                        'time_zone'       => $this->request->getVar('time_zone'),
                        'is_terms_of_use' => $this->request->getVar('is_terms_of_use'),
                        'password'        => $this->request->getVar('password'),
                        'created_at'      => date('Y-m-d')
                    ];
                    $model->save($newData);
                    $session = session();
                    session()->set([
                        'phone' => $phone,
                        'email' => $companyName,
                        'otp_screen_partner' => true,
                    ]);
                    $session->setFlashdata('success', 'Congratulations, you have successfully registered as a partner! Please check your phone for the OTP.');
                    return redirect()->to(base_url('verify-otp-partner'));
                    //return redirect()->to(base_url('login'));
                } else {
                    $session = session();
                    $session->setFlashdata('error', 'Failed to send OTP. Please try again.');
                    return redirect()->back()->withInput();
                }


                // echo '<pre>';print_r($newData);die;
                //$lastQuery = $model->getLastQuery();
                //echo $lastQuery;die;

                //$session = session();
                //$session->setFlashdata('success', 'Congratulations, you have successfully registered as a partner!');
                //return redirect()->to(base_url('login'));
            }
        }
        $data['countryCodes'] = get_country_code_list();
        $data['timeZones']    = get_time_zones();
        $this->setPageTitle('Partner Registration');
        $data['pageTitle']    = $this->getPageTitle();
        return view("auth/registerPartner", $data);
    }

    private function validateRecaptcha($recaptchaResponse)
    {
        // Verify reCAPTCHA response with Google API
        $secretKey = $_ENV['RECAPTCHA_SECRET_KEY'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret'   => $secretKey,
            'response' => $recaptchaResponse
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result);

        return $response->success;
    }
}
