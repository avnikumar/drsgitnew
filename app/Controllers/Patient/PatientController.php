<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PatientModel;
use App\Models\PatientAddressModel;
use App\Models\PatientDocumentModel;
use App\Facades\PatientFacade;

class PatientController extends BaseController
{
    protected $patientModel;
    protected $patientAddressModel;
    protected $patientDocumentModel;
    protected $sessionData;
    protected $userId;
    protected $userEmail;
    protected $countryId;
    protected $userDetails;

    public function __construct()
    {
        // Load the model
        $this->patientModel = new PatientModel();
        $this->patientAddressModel = new PatientAddressModel();
        $this->patientDocumentModel = new PatientDocumentModel();
        $this->sessionData  = session()->get();
        //echo '<pre>';print_r($this->sessionData); die;
        $this->userId = $this->sessionData['user_id'];
        $this->userEmail = $this->sessionData['email'];
        $this->countryId = $this->sessionData['country_id'];
        $this->userDetails = get_user_details($this->userId, 'phone', 'patient');
    }
    public function dashboard()
    {
        $this->setPageTitle('Patient Dashbord');
        return view("patient/dashboard", [
            'pageTitle' => $this->getPageTitle(),
            'userDetails' => $this->userDetails,
        ]);
    }
    public function myBookings()
    {
        $this->setPageTitle('My Bookings');
        return view("patient/my_bookings", [
            'pageTitle' => $this->getPageTitle(),
            'userDetails' => $this->userDetails,
        ]);
    }
    public function myDoctors()
    {
        $this->setPageTitle('My Bookings');
        return view("patient/my_doctors", [
            'pageTitle' => $this->getPageTitle(),
            'userDetails' => $this->userDetails,
        ]);
    }
    public function mySettings()
    {
        $this->setPageTitle('My Settings');
        $patientDetails = PatientFacade::getPatientDetailsByUserId($this->userId);
        $patientAddress = PatientFacade::getPatientAddressByUserId($this->userId);
        if ($this->request->getMethod() == 'POST') {
            $formData = $this->request->getPost();
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
                'gender' => [
                    'label' => 'Gender',
                    'rules' => 'required|validate_gender[Male,Female,Other]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'validate_gender' => '{field} should be Male, Female, Other.'
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
                'state' => [
                    'label' => 'State',
                    'rules' => 'required|numeric|min_length[1]|max_length[4]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'city' => [
                    'label' => 'City',
                    'rules' => 'required|numeric|min_length[1]|max_length[5]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'postal_code' => [
                    'label' => 'Postal Code',
                    'rules' => 'required|numeric|min_length[5]|max_length[6]',
                    'errors' => [
                        'required' => 'The {field} is required.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} must not exceed {param} characters.'
                    ]
                ],
                'address' => [
                    'label' => 'Address',
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required'    => 'The {field} is required.',
                        'min_length'  => 'The {field} must be at least {param} characters long.',
                        'max_length'  => 'The {field} must not exceed {param} characters.'
                    ]
                ],
            ]);

            if (!$validation->run($this->request->getPost())) {
                return view('patient/my_settings', [
                    'validation'     => $validation,
                    'errors'         => $validation->getErrors(),
                    'pageTitle'      => $this->getPageTitle(),
                    'patientDetails' => $patientDetails,
                    'patientAddress' => $patientAddress,
                    'timeZones'      => get_time_zones(),
                    'countryName'    => get_country_name_by_id($this->countryId),
                    'stateNames'     => get_states_by_country_id($this->countryId),
                    'userDetails'    => $this->userDetails,
                    'documents'      => $this->patientDocumentModel->getDocumentByUserId($this->userId)
                ]);
                return redirect()->back()->withInput()->with('validation', $this->validator);
            } else {
                //Update Patient profile to drs_patient table
                $updateProfileResult = $this->patientModel->updateProfile($this->userId, [
                    'first_name' => $formData['first_name'],
                    'last_name'  => $formData['last_name'],
                    'dob'        => $formData['dob'],
                    'time_zone'  => $formData['time_zone'],
                    'gender'     => $formData['gender'],
                ]);
                //Insert or Update Address drs_patient_address table
                $updateAddressResult = $this->patientAddressModel->updateOrCreateAddress($this->userId, [
                    'user_id' => $this->userId,
                    'country' => $formData['country'],
                    'state'   => $formData['state'],
                    'city'    => $formData['city'],
                    'address' => $formData['address'],
                    'postal_code' => $formData['postal_code'],
                    'created_at' => date('y-m-d'),
                ]);

                // Check if both operations were successful
                if ($updateProfileResult && $updateAddressResult) {
                    return redirect()->back()->with('success', 'Profile and address updated successfully.');
                } else {
                    return redirect()->back()->with('error', 'Failed to update profile or address. Please try again.')->withInput();
                }
            }
        }
        return view("patient/my_settings", [
            'pageTitle'      => $this->getPageTitle(),
            'patientDetails' => $patientDetails,
            'patientAddress' => $patientAddress,
            'timeZones'      => get_time_zones(),
            'countryName'    => get_country_name_by_id($this->countryId),
            'stateNames'     => get_states_by_country_id($this->countryId),
            'userDetails'    => $this->userDetails,
            'documents'      => $this->patientDocumentModel->getDocumentByUserId($this->userId)
        ]);
    }
}
