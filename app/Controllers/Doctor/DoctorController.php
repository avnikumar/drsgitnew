<?php

namespace App\Controllers\Doctor;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DoctorModel;
use App\Models\DoctorAddressModel;
use App\Models\DoctorDocumentModel;
use App\Models\DoctorLanguageModel;
use App\Models\DoctorSpecializationModel;
use App\Models\DoctorQualificationModel;
use App\Models\DoctorServiceRateModel;
use App\Models\DoctorBankDetailsModel;
use App\Models\LocationModel;
use App\Facades\DoctorFacade;

class DoctorController extends BaseController
{
    protected $doctorModel;
    protected $doctorAddressModel;
    protected $doctorDocumentModel;
    protected $doctorLanguageModel;
    protected $doctorSpecializationModel;
    protected $doctorQualificationModel;
    protected $doctorServiceRateModel;
    protected $doctorBankDetailsModel;
    protected $locationModel;
    protected $sessionData;
    protected $userId;
    protected $userEmail;
    protected $countryId;
    protected $userDetails;
    public function __construct()
    {
        // Load the model
        $this->doctorModel = new DoctorModel();
        $this->doctorAddressModel  = new DoctorAddressModel();
        $this->doctorDocumentModel = new DoctorDocumentModel();
        $this->doctorLanguageModel = new DoctorLanguageModel();
        $this->doctorSpecializationModel = new DoctorSpecializationModel();
        $this->doctorQualificationModel  = new DoctorQualificationModel();
        $this->doctorServiceRateModel    = new DoctorServiceRateModel();
        $this->doctorBankDetailsModel    = new DoctorBankDetailsModel();
        $this->locationModel    = new LocationModel();

        $this->sessionData  = session()->get();
        //echo '<pre>';print_r($this->sessionData); die;
        $this->userId = $this->sessionData['user_id'];
        $this->userEmail = $this->sessionData['email'];
        $this->countryId = $this->sessionData['country_id'];
        $this->userDetails = get_user_details($this->userId, 'phone', 'doctor');
    }

    public function dashboard()
    {
        // Set the page title
        $this->setPageTitle('Doctor Dashbord');
        $sessionData = session()->get();
        //echo '<pre>';print_r($sessionData);
        return view('doctor/dashboard', [
            'pageTitle' => $this->getPageTitle(),
            'session_data' => $sessionData
        ]);
    }
    
    public function myBookings()
    {
        $this->setPageTitle('My Bookings');
        return view("doctor/my_bookings", [
            'pageTitle' => $this->getPageTitle(),
            'userDetails' => $this->userDetails,
        ]);
    }

    public function myDoctors()
    {
        $this->setPageTitle('My Bookings');
        return view("doctor/my_patients", [
            'pageTitle' => $this->getPageTitle(),
            'userDetails' => $this->userDetails,
        ]);
    }

    public function mySettings()
    {
        $this->setPageTitle('My Settings');
        $doctorDetails = DoctorFacade::getDoctorDetailsByUserId($this->userId);
        $doctorAddress = DoctorFacade::getDoctorAddressByUserId($this->userId);
        //echo '<pre>';print_r($doctorDetails); die;
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
                'license_number' => [
                    'label' => 'License Number',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The {field} is required.',
                    ]
                ],
                'about' => [
                    'label' => 'Short Bio',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The {field} is required.',
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
                return view('doctor/my_settings', [
                    'validation'     => $validation,
                    'errors'         => $validation->getErrors(),
                    'pageTitle'      => $this->getPageTitle(),
                    'doctorDetails'  => $doctorDetails,
                    'doctorAddress'  => $doctorAddress,
                    'timeZones'      => get_time_zones(),
                    'countryName'    => get_country_name_by_id($this->countryId),
                    'stateNames'     => get_states_by_country_id($this->countryId),
                    'languages'      => get_languages_list(),
                    'dr_language'    => $this->doctorLanguageModel->getLanguagesByUserId($this->userId),
                    'dr_specialization'=> $this->doctorSpecializationModel->getSpecializationByUserId($this->userId),
                    'dr_qualification'=>$this->doctorQualificationModel->getQualificationByUserId($this->userId),
                    'specializations' => get_specialization_list(),
                    'userDetails'    => $this->userDetails,
                    'dr_locations'   => $this->locationModel->getLocationsAddedByUserId($this->userId),
                    'serviceRates'   => $this->doctorServiceRateModel->getAllServiceRateByUserId($this->userId),
                    'documents'      => $this->doctorDocumentModel->getDocumentByUserId($this->userId)
                ]);
                return redirect()->back()->withInput()->with('validation', $this->validator);
            } else {
                //Update Patient profile to drs_patient table
                $updateProfileResult = $this->doctorModel->updateProfile($this->userId, [
                    'first_name' => $formData['first_name'],
                    'last_name'  => $formData['last_name'],
                    'dob'        => $formData['dob'],
                    'time_zone'  => $formData['time_zone'],
                    'gender'     => $formData['gender'],
                    'license_number' => $formData['license_number'],
                    'about'      => $formData['about'],
                ]);
                //Insert or Update Address drs_patient_address table
                $updateAddressResult = $this->doctorAddressModel->updateOrCreateAddress($this->userId, [
                    'user_id' => $this->userId,
                    'country' => $formData['country'],
                    'state'   => $formData['state'],
                    'city'    => $formData['city'],
                    'address' => $formData['address'],
                    'postal_code' => $formData['postal_code'],
                    'created_at'  => date('y-m-d'),
                ]);

                // Check if both operations were successful
                if ($updateProfileResult && $updateAddressResult) {
                    return redirect()->back()->with('success', 'Profile and address updated successfully.');
                } else {
                    return redirect()->back()->with('error', 'Failed to update profile or address. Please try again.')->withInput();
                }
            }
        }

        return view("doctor/my_settings", [
            'pageTitle'      => $this->getPageTitle(),
            'doctorDetails'  => $doctorDetails,
            'doctorAddress'  => $doctorAddress,
            'timeZones'      => get_time_zones(),
            'countryName'    => get_country_name_by_id($this->countryId),
            'stateNames'     => get_states_by_country_id($this->countryId),
            'specializations'=> get_specialization_list(),
            'languages'      => get_languages_list(),
            'dr_language'    => $this->doctorLanguageModel->getLanguagesByUserId($this->userId),
            'dr_specialization'=> $this->doctorSpecializationModel->getSpecializationByUserId($this->userId),
            'dr_qualification'=>$this->doctorQualificationModel->getQualificationByUserId($this->userId),
            'userDetails'    => $this->userDetails,
            'dr_locations'   => $this->locationModel->getLocationsAddedByUserId($this->userId),
            'serviceRates'   => $this->doctorServiceRateModel->getAllServiceRateByUserId($this->userId),
            'documents'      => $this->doctorDocumentModel->getDocumentByUserId($this->userId)
        ]);
    }

    public function updatePassword()
    {
        if ($this->request->getMethod() == 'POST') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'old_password' => [
                    'label' => 'Old Password',
                    'rules' => 'required|min_length[8]|max_length[255]',
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
            ]);
    
            if (!$validation->run($this->request->getPost())) {
                $errors = $validation->getErrors();
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $errors
                ]);
            } else {
                $oldPassword = $this->request->getVar('old_password');
                $newPassword = $this->request->getVar('password');
                $response = DoctorFacade::updatePassword($this->userId, $oldPassword, $newPassword);
                
                return $this->response->setJSON($response);
            }
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request method.']);
    }
    
    function addLanguage(){
        $userId = $this->request->getPost('user_id');
        $languageId = $this->request->getPost('language_id');
        // Validate input data
        $data = [
            'user_id' => $userId,
            'language_id' => $languageId,
        ];
        if (!$this->doctorLanguageModel->validate($data)) {
            return $this->response->setJSON([
                'status' => 'error',
                'messages' => $this->doctorLanguageModel->errors(),
            ]);
        }
        if ($this->doctorLanguageModel->addLanguage($userId, $languageId)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Language added successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Language already exists for this user.',
            ]);
        }
    }

    function removeLanguage(){
        $userId = $this->request->getPost('user_id');
        $languageId = $this->request->getPost('language_id');

        if ($this->doctorLanguageModel->removeLanguage($userId, $languageId)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Language removed successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to remove language. Language not found.',
            ]);
        }
    }

    function addSpecialization(){
        $userId = $this->request->getPost('user_id');
        $specializationId = $this->request->getPost('specialization_id');
        // Validate input data
        $data = [
            'user_id' => $userId,
            'specialization_id' => $specializationId,
        ];
        if (!$this->doctorSpecializationModel->validate($data)) {
            return $this->response->setJSON([
                'status' => 'error',
                'messages' => $this->doctorSpecializationModel->errors(),
            ]);
        }
        if ($this->doctorSpecializationModel->addSpecialization($userId, $specializationId)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Specialization added successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Specialization already exists for this user.',
            ]);
        }
    }

    function removeSpecialization(){
        //$this->doctorSpecializationModel->removeSpecialization($this->userId,);
        $userId = $this->request->getPost('user_id');
        $specializationId = $this->request->getPost('specialization_id');

        if ($this->doctorSpecializationModel->removeSpecialization($userId, $specializationId)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Specialization removed successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to remove specialization. Specialization not found.',
            ]);
        }
    }

    function addQualification(){
        // $this->doctorQualificationModel->addQualification($this->userId,);
        $userId = $this->request->getPost('user_id');
        $qualification = $this->request->getPost('qualification');
        // Validate input data
        $data = [
            'user_id' => $userId,
            'qualification' => $qualification,
        ];
        if (!$this->doctorQualificationModel->validate($data)) {
            return $this->response->setJSON([
                'status' => 'error',
                'messages' => $this->doctorQualificationModel->errors(),
            ]);
        }
        if ($this->doctorQualificationModel->addQualification($userId, $qualification)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Qualification added successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Qualification already exists for this user.',
            ]);
        }
    }

    function removeQualification(){
        $userId = $this->request->getPost('user_id');
        $qualification = $this->request->getPost('qualification');

        if ($this->doctorQualificationModel->removeQualification($userId, $qualification)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Qualification removed successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to remove qualification. Qualification not found.',
            ]);
        }
    }

    public function updateOnlineCallServiceRate()
    {
        $data = $this->request->getPost();
        if ($this->doctorServiceRateModel->updateOrCreateServiceRate($this->userId, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Service rate submitted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to submit service rate.']);
        }
    }

    public function updateHouseCallServiceRate()
    {
        $data = $this->request->getPost();
        if ($this->doctorServiceRateModel->updateOrCreateServiceRate($this->userId, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Service rate submitted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to submit service rate.']);
        }
    }
    
    public function updateClinicVisitServiceRate()
    {
        $data = $this->request->getPost();
        if ($this->doctorServiceRateModel->updateOrCreateServiceRate($this->userId, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Service rate submitted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to submit service rate.']);
        }
    }

    public function addBankDetails()
    {
        $data = $this->request->getPost();
        if (!$this->validate($this->doctorBankDetailsModel->validationRules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors(),
            ]);
        }
        $result = $this->doctorBankDetailsModel->addBankDetails($this->userId, $data);
        if ($result) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Bank details saved successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to save bank details.',
            ]);
        }
    }
    public function addLocation(){
        $data = $this->request->getPost();
        if (!$this->validate($this->locationModel->validationRules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors(),
            ]);
        }
        $data['location_of'] = 'DOCTOR';
        $data['user_id']     = $this->userId;
        $data['country']     = $this->countryId;
        if (isset($data['location_id']) && $data['location_id'] != '') {
            $result = $this->locationModel->updateOrCreateLocation($this->userId, $data, $data['location_id']);
        } else {
            $result = $this->locationModel->updateOrCreateLocation($this->userId, $data);
        }
        if ($result) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Bank details saved successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to save bank details.',
            ]);
        }
    }    
    public function updateLocationForm(){
        $locid = $this->request->getGet('locid');
        if (empty($locid)) {
            return 'Error: locid is missing';
        }
        $stateNames   = get_states_by_country_id($this->countryId);
        $locationInfo = $this->locationModel->getLocationById($locid);
        $stateId      = $locationInfo['state'];
        $cityId       = $locationInfo['city'];
        $postalCode   = $locationInfo['postal_code'];
        $address      = $locationInfo['address'];
        $cities       = get_city_list_by_states_id($stateId);
        $html = '<form id="updateLocation">
            <div class="col-12">
              <div class="crancy-flex__right">
                <a id="crancy-main-form__close" type="initial" class="crancy-preview__modal--close btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_989_10425)">
                      <circle cx="12" cy="12" r="12" fill="#EDF2F7"></circle>
                      <path d="M16.9498 7.05029L7.05033 16.9498" stroke="#5D6A83" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M7.05029 7.05029L16.9498 16.9498" stroke="#5D6A83" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                    <defs>
                      <clipPath id="clip0_989_10425">
                        <rect width="24" height="24" fill="white"></rect>
                      </clipPath>
                    </defs>
                  </svg>
                </a>
              </div>
              <div class="crancy-wc__heading crancy-flex__column-center text-center">
                <h3 class="crancy-login-popup__title">Update Location</h3>
              </div>
              <div class="row">
                <div class="col-lg-12 col-12">
                    <input type="hidden" value="'.$locid.'" name="location_id">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">State</label>
                    <select name="state" class="form-select crancy__item-input" id="stateSelect3" aria-label="Default select example" style="display: block;" required>
                      <option value="">Select Your State</option>';
                      if (!empty($cities)) :
                        foreach ($stateNames as $key => $states) :
                          $selected = ($stateId == $states['state_id']) ? 'selected' : '';
                          $html .='<option value="' . $states['state_id'] . '" ' . set_select('state', $states['state_id']) . ' ' . $selected . '>' . $states['name'] . '</option>';
                        endforeach;
                      endif;
                    $html .='</select>
                  </div>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">City</label>
                    <select id="cityList3" name="city" class="form-select crancy__item-input" aria-label="Default select example" style="display: block;" required>
                      <!--City Name-->
                       <option value="">Select Your City</option>';
                      if (!empty($cities)) :
                        foreach ($cities as $key => $city) :
                          $selected = ($cityId == $city['id']) ? 'selected' : '';
                          $html .='<option value="' . $city['id'] . '" ' . set_select('city', $city['id']) . ' ' . $selected . '>' . $city['name'] . '</option>';
                        endforeach;
                      endif;
                    $html .='</select>
                  </div>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">Postal Code</label>
                    <input class="crancy__item-input" type="text" value="'.$postalCode.'" name="postal_code" placeholder="Postal Code" required>
                  </div>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">Address</label>
                    <input class="crancy__item-input" type="text" value="'.$address.'" name="address" placeholder="Clinic Address" required>
                  </div>
                </div>
              </div>
            </div>
            <div></div>
            <button class="crancy-btn crancy-btn__currency crancy-full-width mg-top-40">Save</button>
          </form>';
        echo $html;
    }
}
