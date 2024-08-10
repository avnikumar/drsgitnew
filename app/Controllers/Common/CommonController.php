<?php

namespace App\Controllers\Common;
use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\DoctorModel;
use App\Models\PatientDocumentModel;
use App\Models\DoctorDocumentModel;
class CommonController extends BaseController
{
    protected $patientModel;
    protected $doctorModel;
    protected $patientDocumentModel;
    protected $doctorDocumentModel;
    protected $sessionData;
    protected $userId;
    protected $userEmail;
    public function __construct()
    {
        $this->patientModel = new PatientModel();
        $this->doctorModel = new DoctorModel();
        $this->patientDocumentModel = new PatientDocumentModel();
        $this->doctorDocumentModel = new DoctorDocumentModel();
        $this->sessionData  = session()->get();
        $this->userId = $this->sessionData['user_id'];
        $this->userEmail = $this->sessionData['email'];
    }
    public function getCitiesOptionListByStateId(){
        $stateId = $this->request->getPost('stateId');
        $selectedCity  = $this->request->getPost('cityId');
        $selectFor  = $this->request->getPost('selectFor');
        $cities = get_city_list_by_states_id($stateId);
        $selected = '';
        $options  = '';
        if(!empty($cities)){
            $options .= '<option selected="">Select City</option>';
            foreach($cities as $key=>$city){
                if($selectedCity!=''){
                    $selected = $city['id'] == $selectedCity?'selected':'';
                }
                $options .= '<option value="'.$city['id'].'" '.$selected.'>'.$city['name'].'</option>';
            }
        } else {
            $options .= '<option selected="">No Record Found</option>';
        }
        return $this->response->setBody($options);
    }
    
    public function uploadDocument(){
        $request = $this->request->getJSON();
        $base64Image = $request->image;
        $fileFor = $request->fileFor;
        $tableColumn = $request->tableColumn;

        $matches = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];
            // Extract the MIME type from the base64 string
            if (preg_match('/^data:(.*);base64,/', $base64Image, $matches)) {
                $mimeType = $matches[1]; // Get the MIME type
                $base64Image = str_replace('data:' . $mimeType . ';base64,', '', $base64Image); // Remove the prefix
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid base64 data.']);
            }


        //$base64Image = str_replace('data:image/png;base64,', '', $base64Image);
       // $base64Image = str_replace(' ', '+', $base64Image);
        //$image = base64_decode($base64Image);
        $decodedImage = base64_decode($base64Image);
        // Define the path to save the image
        //$imageName = uniqid() . '.png'; 

        // Determine the file type


        //$base64Image = str_replace(' ', '+', $base64Image);
        // $image = base64_decode($base64Image);

        // Define allowed MIME types
        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $allowedPdfFileTypes = ['application/pdf'];
        $allowedDocFileTypes = ['application/msword']; // DOC
        $allowedDocxFileTypes = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document']; // DOCX

        // Combine allowed types
        $allowedTypes = array_merge($allowedImageTypes, $allowedPdfFileTypes, $allowedDocFileTypes, $allowedDocxFileTypes);

        // Check if the file type is allowed
        if (!in_array($mimeType, $allowedTypes)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid file type.']);
        }
        
        // Define the path and file name
        $path = '';
        $fileType = '';
        $imageName = '';

        // Set the file extension based on the MIME type
        if (in_array($mimeType, $allowedImageTypes)) {
            $fileType = 'IMAGE';
            $imageName = uniqid() . '.png'; 
            //$imageName .= '.' . explode('/', $mimeType)[1]);
        } elseif (in_array($mimeType, $allowedPdfFileTypes)) {
            $fileType = 'PDF';
            $imageName .= uniqid() . '.pdf';
        } elseif (in_array($mimeType, $allowedDocFileTypes)) {
            $fileType = 'DOC';
            $imageName .= uniqid() . '.doc';
        } elseif (in_array($mimeType, $allowedDocxFileTypes)) {
            $fileType = 'DOCX';
            $imageName .= uniqid() . '.docx';
        } else {
            // Handle unsupported file types
            return $this->response->setJSON(['success' => false, 'message' => 'Unsupported file type.']);
        }

        /*Doctor Profile Documents*/
        if($fileFor=='patientProfilePic'){
            // Ensure the directory exists
            $path = FCPATH . 'public/uploads/patient/profile_pic/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            // Save the image to the specified path
            file_put_contents($path . $imageName, $decodedImage);
            // Update the database record
            $updateRecord = $this->patientModel->updateProfilePicture($this->userId, [
                'profile_pic' => $imageName,
            ]);
            $uploadedImage = PATIENT_PROFILE_PIC_PATH.$imageName;
        }     
        if($fileFor=='patientDocumentPic'){
            // Ensure the directory exists
            $path = FCPATH . 'public/uploads/patient/document/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            // Save the image to the specified path
            file_put_contents($path . $imageName, $decodedImage);
            // Update the database record
            $updateRecord = $this->patientDocumentModel->updateOrCreateDocument($this->userId, [
                'user_id'     => $this->userId,
                'column_name' => $tableColumn,//'id_proof',
                'file_name'   => $imageName,
                'file_type'   => $fileType,
                'created_at'  => date('y-m-d'),
            ]);
            $uploadedImage = PATIENT_ID_PROOF_FILE_PATH.$imageName;
        }         
        /*Doctor Profile Documents*/
        if($fileFor=='doctorProfilePic'){
            // Ensure the directory exists
            $path = FCPATH . 'public/uploads/doctor/profile_pic/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            // Save the image to the specified path
            file_put_contents($path . $imageName, $decodedImage);
            // Update the database record
            $updateRecord = $this->doctorModel->updateProfilePicture($this->userId, [
                'profile_pic' => $imageName,
            ]);
            $uploadedImage = DOCTOR_PROFILE_PIC_PATH.$imageName;
        }     
        if($fileFor=='doctorDocumentPic'){
            // Ensure the directory exists
            $path = FCPATH . 'public/uploads/doctor/document/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            // Save the image to the specified path
            file_put_contents($path . $imageName, $decodedImage);
            // Update the database record
            $updateRecord = $this->doctorDocumentModel->updateOrCreateDocument($this->userId, [
                'user_id'     => $this->userId,
                'column_name' => $tableColumn,//'id_proof',
                'file_name'   => $imageName,
                'file_type'   => $fileType,
                'created_at'  => date('y-m-d'),
            ]);
            $uploadedImage = DOCTOR_ID_PROOF_FILE_PATH.$imageName;
        }         

        // Return a response
        return $this->response->setJSON(['success' => true, 'fileType'=>$fileType,'fileFor'=> $fileFor, 'message' => 'Uploaded Successfully.',  'image' => $uploadedImage]);
    }
}