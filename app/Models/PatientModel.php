<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drs_patients';
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
        "gender",
        "dob",
        "country_code",
        "country_id",
        "phone",
        "time_zone",
        "email",
        "profile_pic",
        "email_verified_at",
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
    protected $validationRules      = [
        'first_name' => [
            'label' => 'First Name',
            'rules' => 'required|alpha_space|min_length[2]',
        ],
        'last_name' => [
            'label' => 'Last Name',
            'rules' => 'required|alpha_space|min_length[2]',
        ],
        'dob' => [
            'label' => 'DOB',
            'rules' => 'required|valid_date[Y-m-d]',
        ],
        'email' => [
            'label' => 'Email Address',
            'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[drs_patients.email]',
        ],
        'gender' => [
            'label' => 'Gender',
            'rules' => 'required|validate_gender[Male,Female,Other]',
        ],
        'country_code' => [
            'label' => 'Country Code',
            'rules' => 'required|min_length[1]|max_length[3]',
        ],
        'phone' => [
            'label' => 'Phone',
            'rules' => 'required|numeric|min_length[10]|max_length[10]|is_unique[drs_patients.phone]',
            
        ],
        'time_zone' => [
            'label' => 'Time Zone',
            'rules' => 'required|min_length[1]|max_length[2]',
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[8]|max_length[255]',
            
        ],
        'confirm_password' => [
            'label' => 'Confirm Password',
            'rules' => 'matches[password]',
           
        ],
       'is_terms_of_use' => [
            'label' => 'Terms of Use',
            'rules' => 'required|min_length[1]|max_length[1]',
        ]
    ];
    protected $validationMessages = [
        'first_name' => [
            'required' => 'The {field} is required.',
            'alpha_space' => 'The {field} can only contain alphabetical characters and spaces.',
            'min_length' => 'The {field} must be at least {param} characters long.',
        ],
        'last_name' => [
            'required' => 'The {field} is required.',
            'alpha_space' => 'The {field} can only contain alphabetical characters and spaces.',
            'min_length' => 'The {field} must be at least {param} characters long.',
        ],
        'dob' => [
            'required' => 'The {field} is required.',
            'valid_date' => 'The {field} must be in a valid date format (YYYY-MM-DD).',
        ],
		'email' => [
			'required' => 'The {field} is required.',
			'min_length' => 'The {field} must be at least {param} characters long.',
			'max_length' => 'The {field} must not exceed {param} characters.',
			'valid_email' => 'The {field} must be a valid email address.',
			'is_unique' => 'The email address already used.'
		],
		'country_code' => [
			'required' => 'The {field} is required.',
			'min_length' => 'The {field} must be at least {param} characters long.',
			'max_length' => 'The {field} must not exceed {param} characters.'
		],
		'phone' => [
			'required' => 'The {field} is required.',
			'min_length' => 'The {field} must be at least {param} characters long.',
			'max_length' => 'The {field} must not exceed {param} characters.'
		],
        'gender' => [
            'required' => 'The {field} is required.',
            'validate_gender' => '{field} should be Male, Female, or Other.',
        ],
        'time_zone' => [
            'required' => 'The {field} is required.',
            'min_length' => 'The {field} must be at least {param} characters long.',
            'max_length' => 'The {field} must not exceed {param} characters.',
        ],
		'password' => [
			'required' => 'The {field} is required.',
			'min_length' => 'The {field} must be at least {param} characters long.',
			'max_length' => 'The {field} must not exceed {param} characters.'
		],
		 'confirm_password' => [
			'required' => 'The {field} is required.',
			'matches' => 'The {field} must match the Password.'
		],
		'is_terms_of_use' => [
			'required' => 'You must agree to the {field}.',
			'min_length' => 'The {field} must be at least {param} character long.',
			'max_length' => 'The {field} must not exceed {param} character.'
		]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ["beforeInsert"];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
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

	protected function passwordHash(array $data)
	{
		if (isset($data['data']['password'])) {
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		}
		return $data;
	}

    public function getDetailsByUserId($userId)
    {
        return $this->select('user_id,role,member_id,first_name,last_name,gender,dob,country_code,country_id,phone,time_zone,email,status,profile_pic')
                ->where('user_id', $userId)
                ->first();
    }
    
    public function getDetailsByUserEmail($userEmail)
    {
        return $this->select('user_id,role,member_id,first_name,last_name,gender,dob,country_code,country_id,phone,time_zone,email,status,profile_pic')
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
                $imagePath = FCPATH . 'public/uploads/patient/profile_pic/' . $existingProfilePic['profile_pic'];
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
    
}
