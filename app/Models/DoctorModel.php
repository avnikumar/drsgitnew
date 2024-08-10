<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drs_doctors';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "role",
        "member_id",
        "first_name",
        "last_name",
        "doctor_url_name",
        "gender",
        "dob",
        "country_code",
        "country_id",
        "phone",
        "time_zone",
        "email",
        "profile_pic",
        "email_verified_at",
        "license_number",
        "about",
        "password",
        "is_terms_of_use",
        "otp",
        "otp_status",
        "status",
        "created_at",
        "updated_at"
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ["beforeInsert"];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ["beforeUpdate"];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }
    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }
    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }

    public function getDetailsByUserId($userId)
    {
        return $this->select('user_id,role,member_id,first_name,last_name,gender,dob,country_code,country_id,phone,time_zone,email,status,profile_pic,license_number,about')
            ->where('user_id', $userId)
            ->first();
    }

    public function getDetailsByUserEmail($userEmail)
    {
        return $this->select('user_id,role,member_id,first_name,last_name,gender,dob,country_code,country_id,phone,time_zone,email,status,profile_pic,license_number,about')
            ->where('email', $userEmail)
            ->first();
    }

    public function updateProfile($userId, $data)
    {
        $existingUser = $this->where('user_id', $userId)->first();
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($existingUser) {
            if ($this->update($userId, $data)) {
                return [
                    'status' => 'success',
                    'message' => 'Profile updated successfully.'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Failed to update profile.'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'User not found.'
            ];
        }
    }
    public function updateProfilePicture($userId, $data)
    {
        $existingProfilePic = $this->where('user_id', $userId)->first();
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($existingProfilePic) {
            if (!empty($existingProfilePic['profile_pic'])) {
                // Delete the existing image file from the server
                $imagePath = FCPATH . 'public/uploads/doctor/profile_pic/' . $existingProfilePic['profile_pic'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            if ($this->update($userId, $data)) {
                return [
                    'status' => 'success',
                    'message' => 'Profile picture updated successfully.'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Failed to update profile picture.'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'User not found.'
            ];
        }
    }
    public function updatePassword($userId, $oldPassword, $newPassword)
    {
        // Fetch the user by ID
        $existingUser = $this->find($userId);
        if ($existingUser) {
            // Verify the old password
            if (!password_verify($oldPassword, $existingUser['password'])) {
                return [
                    'status' => 'error',
                    'message' => 'Old password is incorrect.'
                ];
            }
            // Update the user's password
            $updateData = ['password' => $newPassword];
            if ($this->update($userId, $updateData)) {
                return [
                    'status' => 'success',
                    'message' => 'Password updated successfully.'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Failed to update password.'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'User not found.'
            ];
        }
        
    }


}
