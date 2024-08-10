<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\DoctorModel;
use App\Models\PartnerModel;
use App\Models\PatientModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index()
    {
        echo "login controller";
        //return view("auth/login");
    }
    public function loginPatient()
    {
        if ($this->request->getMethod() == 'POST') {
            // $session = session();
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => [
                    'label' => 'Email or Phone',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.',
                        'valid_email' => 'The {field} must be a valid email address.',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
            ]);

            if (!$validation->run($this->request->getPost())) {
                $errors = $validation->getErrors();
                return view('auth/login', [
                    'validation'   => $validation,
                    'errors'       => $errors
                ]);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $remember = $this->request->getPost('remember');

                if (!is_string($password)) {
                    return redirect()->back()->withInput()->with('error', 'Invalid password format.');
                }
                $model = new PatientModel();
                $user = $model->where('email', $email)->first();
                if (!$user || !password_verify($password, $user['password'])) {
                    return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
                } else {
                    $countryCode = $user['country_code'];
                    $phone = $user['phone'];
                    $otp = rand(1000, 9999); // Generate a random 4-digit OTP
                    helper('twilio');
                    $send_otp = send_otp($countryCode . $phone, $otp);
                    if ($send_otp) {
                        $model->where('email', $email)->set(['otp' => $otp, 'otp_status' => 0])->update();
                        $dataSession = [
                            'country_code' => $user['country_code'],
                            'phone' => $user['phone'],
                            'email' => $email,
                            'otp_screen_patient' => true,
                        ];
                        session()->set($dataSession);
                        if($remember){
                            $this->remember_me($password,$email);
                        }
                    }
                }
                return redirect()->to('/verify-otp-patient');
            }
        }
        return view("auth/login");
    }
    public function verifyOtpPatient()
    {
        if ($this->request->getMethod() == 'POST') {
            $session = session();
            $otp = $this->request->getVar('otp');
            if (!empty($otp)) {
                $otpValue = implode('', $otp);
                if (strlen($otpValue) !== 4) {
                    $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                    return redirect()->back()->withInput();
                } else {
                    $phone = session()->get('phone');
                    $email = session()->get('email');
                    $model = new PatientModel();
                    $record = $model->where('phone', $phone)
                        ->orWhere('email', $email)
                        ->select('otp')
                        ->first();
                    if ($record) {
                        //to send user data after login 
                        $expectedOtp = $record['otp'];
                        if ($otpValue === $expectedOtp) {
                            $model->where('phone', $phone)
                                ->orWhere('email', $email)
                                ->set(['otp_status' => 1])->update();
                            //Remove otp Screen user can't go to otp screen once verified
                            session()->remove('otp_screen_patient');
                            $userDetails = get_user_details($email, 'email', 'patient');
                            if ($userDetails !== null) {
                                $this->setUserSession($userDetails, 'patient');
                                return redirect()->to('/patient/dashboard');
                            } else {
                                return redirect()->back()->withInput()->with('error', 'otp not matched.');
                            }
                        } else {
                            $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                            return redirect()->back()->withInput();
                        }
                    } else {
                        $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                        return redirect()->back()->withInput();
                    }
                }
            }
        }
        $otp_screen_patient = session()->get('otp_screen_patient');
        if ($otp_screen_patient == true) {
            return view("auth/otp");
        } else {
            return redirect()->to(base_url('login-patient'));
        }
    }
    public function loginDoctor()
    {
        if ($this->request->getMethod() == 'POST') {
            // $session = session();
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => [
                    'label' => 'Email or Phone',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.',
                        'valid_email' => 'The {field} must be a valid email address.',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
            ]);

            if (!$validation->run($this->request->getPost())) {
                $errors = $validation->getErrors();
                return view('auth/login-doctor', [
                    'validation'   => $validation,
                    'errors'       => $errors
                ]);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $remember = $this->request->getPost('remember');
                if (!is_string($password)) {
                    return redirect()->back()->withInput()->with('error', 'Invalid password format.');
                }
                $model = new DoctorModel();
                $doctor = $model->where('email', $email)->first();
                if (!$doctor || !password_verify($password, $doctor['password'])) {
                    return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
                } else {
                    $countryCode = $doctor['country_code'];
                    $phone = $doctor['phone'];
                    $otp = rand(1000, 9999); // Generate a random 4-digit OTP
                    helper('twilio');
                    $send_otp = send_otp($countryCode . $phone, $otp);
                    if ($send_otp) {
                        $this->update_url_name($email, 'doctor');
                       
                        $model->where('email', $email)->set(['otp' => $otp, 'otp_status' => 0])->update();
                        $dataSession = [
                            'country_code' => $doctor['country_code'],
                            'phone' => $doctor['phone'],
                            'email' => $email,
                            'otp_screen_doctor' => true,
                        ];
                        session()->set($dataSession);
                        if($remember){
                            $this->remember_me($password,$email);
                        }
                    }
                }
                return redirect()->to('/verify-otp-doctor');
            }
        }
        return view("auth/login");
    }
    public function verifyOtpDoctor()
    {
        if ($this->request->getMethod() == 'POST') {
            $session = session();
            $otp = $this->request->getVar('otp');
            if (!empty($otp)) {
                $otpValue = implode('', $otp);
                if (strlen($otpValue) !== 4) {
                    $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                    return redirect()->back()->withInput();
                } else {
                    $phone = session()->get('phone');
                    $email = session()->get('email');
                    $model = new DoctorModel();
                    $record = $model->where('phone', $phone)
                        ->orWhere('email', $email)
                        ->select('otp')
                        ->first();
                    if ($record) {
                        $expectedOtp = $record['otp'];
                        if ($otpValue === $expectedOtp) {
                            $model->where('phone', $phone)
                                ->orWhere('email', $email)
                                ->set(['otp_status' => 1])->update();
                            //Remove otp Screen user can't go to otp screen once verified
                            session()->remove('otp_screen_doctor');
                            $userDetails = get_user_details($email, 'email', 'doctor');
                            if ($userDetails !== null) {
                                $this->setUserSession($userDetails, 'doctor');
                                return redirect()->to('/doctor/dashboard');
                            } else {
                                return redirect()->back()->withInput()->with('error', 'otp not matched.');
                            }
                        } else {
                            $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                            return redirect()->back()->withInput();
                        }
                    } else {
                        $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                        return redirect()->back()->withInput();
                    }
                }
            }
        }
        $otp_screen_doctor = session()->get('otp_screen_doctor');
        if ($otp_screen_doctor == true) {
            return view("auth/otp");
        } else {
            return redirect()->to(base_url('login-doctor'));
        }
    }
    public function loginPartner()
    {
        if ($this->request->getMethod() == 'POST') {
            // $session = session();
            $validation = \Config\Services::validation();
            $validation->setRules([
                'email' => [
                    'label' => 'Email or Phone',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.',
                        'valid_email' => 'The {field} must be a valid email address.',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
            ]);

            if (!$validation->run($this->request->getPost())) {
                $errors = $validation->getErrors();
                return view('auth/login-partner', [
                    'validation'   => $validation,
                    'errors'       => $errors
                ]);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $remember = $this->request->getPost('remember');
                if (!is_string($password)) {
                    return redirect()->back()->withInput()->with('error', 'Invalid password format.');
                }
                $model = new PartnerModel();
                $partner = $model->where('email', $email)->first();
                if (!$partner || !password_verify($password, $partner['password'])) {
                    return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
                } else {
                    $countryCode = $partner['country_code'];
                    $phone = $partner['phone'];
                    $otp = rand(1000, 9999); // Generate a random 4-digit OTP
                    helper('twilio');
                    $send_otp = send_otp($countryCode . $phone, $otp);
                    if ($send_otp) {
                        $this->update_url_name($email, 'partner');
                        $model->where('email', $email)->set(['otp' => $otp, 'otp_status' => 0])->update();
                        $dataSession = [
                            'country_code' => $partner['country_code'],
                            'phone' => $partner['phone'],
                            'email' => $email,
                            'otp_screen_partner' => true,
                        ];
                        session()->set($dataSession);
                        if($remember){
                            $this->remember_me($password,$email);
                        }
                    }
                }
                return redirect()->to('/verify-otp-partner');
            }
        }
        return view("auth/login");
    }
    public function verifyOtpPartner()
    {
        //session()->remove('phone');
        //session()->destroy();
        if ($this->request->getMethod() == 'POST') {
            $session = session();
            $otp = $this->request->getVar('otp');
            if (!empty($otp)) {
                $otpValue = implode('', $otp);
                if (strlen($otpValue) !== 4) {
                    $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                    return redirect()->back()->withInput();
                } else {
                    $phone = session()->get('phone');
                    $email = session()->get('email');
                    $model = new PartnerModel();
                    $record = $model->where('phone', $phone)
                        ->orWhere('email', $email)
                        ->select('otp')
                        ->first();
                    if ($record) {
                        $expectedOtp = $record['otp'];
                        if ($otpValue === $expectedOtp) {
                            $model->where('phone', $phone)
                                ->orWhere('email', $email)
                                ->set(['otp_status' => 1])->update();
                            //Remove otp Screen user can't go to otp screen once verified
                            session()->remove('otp_screen_partner');
                            $userDetails = get_user_details($email, 'email', 'partner');
                            //echo '<pre>';print_r($userDetails);die;
                            if ($userDetails !== null) {
                                $this->setUserSession($userDetails, 'partner');
                                return redirect()->to('/partner/dashboard');
                            } else {
                                return redirect()->back()->withInput()->with('error', 'otp not matched.');
                            }
                        } else {
                            $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                            return redirect()->back()->withInput();
                        }
                    } else {
                        $session->setFlashdata('error', 'Invalid OTP. Please try again.');
                        return redirect()->back()->withInput();
                    }
                }
            }
        }
        $otp_screen = session()->get('otp_screen_partner');
        if ($otp_screen == true) {
            return view("auth/otp");
        } else {
            return redirect()->to(base_url('login-partner'));
        }
    }
    public function logout()
    {  //Unset All Session
        $session = session();
        $session->destroy();
        // Redirect to login page depends on who is log out
        // Will check user type befor logout if required
        return redirect()->to('/');
    }

    private function setUserSession($user, $userType)
    {
        if($userType=='partner'){
            $data = [
                'user_id'      => $user['user_id'],
                'email'        => $user['email'],
                'user_role'    => $user['role'],
                'user_type'    => $userType,
                'country_id'   => $user['country_id'],
                'country_code' => $user['country_code'],
                'phone'        => $user['phone'],
                'company_name'   => $user['company_name'],
                'company_contact_name'=> $user['company_contact_name'],
                'company_url_name'    => $user['company_url_name'],
                'isLoggedIn'   => true
            ];
         } else {
            $data = [
                'user_id'      => $user['user_id'],
                'email'        => $user['email'],
                'user_role'    => $user['role'],
                'user_type'    => $userType,
                'country_id'   => $user['country_id'],
                'country_code' => $user['country_code'],
                'phone'        => $user['phone'],
                'first_name'   => $user['first_name'],
                'last_name'    => $user['last_name'],
                'isLoggedIn'   => true
            ];
        }
       
        session()->set($data);
        return true;
    }
    function update_url_name($email, $updateFor)
    {
        if ($updateFor == 'doctor') {
            //doctor_url_name
            $urlname = get_url_name($email, $updateFor);
            if ($urlname == '' || $urlname == null) {
                $model = new DoctorModel();
                $doctorInfo = get_user_details($email, 'email', 'doctor');
                $doctorContactName = $doctorInfo['first_name'] . $doctorInfo['last_name'];
                $prefixForUrlName  = sanitize_string(strtolower($doctorContactName));
                $doctorUrlName     = generate_incrementing_value('drs_doctors', 'doctor_url_name', $prefixForUrlName);
                $model->Where('email', $email)->set(['doctor_url_name' => $doctorUrlName])->update();
                return true;
            } else {
                return true;
            }
        } elseif ($updateFor == 'partner') {
            //company_url_name
            $urlname = get_url_name($email, $updateFor);
            if ($urlname == '' or $urlname == null) {
                $model = new PartnerModel();
                $partnerInfo = get_user_details($email, 'email', 'partner');
                $companyContactName = $partnerInfo['company_contact_name'];
                $prefixForUrlName   = sanitize_string(strtolower($companyContactName));
                $partnerUrlName     = generate_incrementing_value('drs_partners', 'company_url_name', $prefixForUrlName);
                $model->Where('email', $email)->set(['company_url_name' => $partnerUrlName])->update();
                return true;
            } else {
                return true;
            }
        } else {
            //Do nothing
            return true;
        }
    }

    function remember_me($password,$email='',$phone=''){
        // Set cookies for email and hashed password
        if($email!=''){
            setcookie('uemail', '', time() - 3600, "/");
            setcookie('uemail', $email, time() + (86400 * 30), "/");
            // $emailCookie = [
            //     'name'   => 'uemail',
            //     'value'  => $email,
            //     'expire' => 60 * 60 * 24 * 30, // 1 month
            //     'secure' => true, // true if you are using HTTPS
            //     'httponly' => true // Makes the cookie accessible only through the HTTP protocol
            // ];
            // set_cookie($emailCookie);
        }
        if($phone!=''){
            setcookie('uphone', '', time() - 3600, "/");
            setcookie('uphone', $phone, time() + (86400 * 30), "/");
            // $phoneCookie = [
            //     'name'   => 'uphone',
            //     'value'  => $phone,
            //     'expire' => 60 * 60 * 24 * 30, // 1 month
            //     'secure' => true, // true if you are using HTTPS
            //     'httponly' => true // Makes the cookie accessible only through the HTTP protocol
            // ];
            // set_cookie($phoneCookie);
        }
        if($password!=''){
            setcookie('upass', '', time() - 3600, "/");
            setcookie('upass', $password, time() + (86400 * 30), "/");
            // $passwordCookie = [
            //     'name'   => 'upass',
            //     'value'  => $password,
            //     'expire' => 60 * 60 * 24 * 30, // 1 month
            //     'secure' => true, // true if you are using HTTPS
            //     'httponly' => true // Makes the cookie accessible only through the HTTP protocol
            // ];
            // set_cookie($passwordCookie);
        }
    }
}
