<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorAddressModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drs_doctor_address';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 
        'country', 
        'state', 
        'city', 
        'address', 
        'postal_code',
        'created_at', 
        'updated_at'
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
    protected $validationRules = [
        'state' => [
            'label' => 'State',
            'rules' => 'required|numeric|min_length[1]|max_length[4]',
        ],
        'city' => [
            'label' => 'City',
            'rules' => 'required|numeric|min_length[1]|max_length[5]',
        ],
        'postal_code' => [
            'label' => 'Postal Code',
            'rules' => 'required|numeric|min_length[5]|max_length[6]',
        ],
        'address' => [
            'label' => 'Address',
            'rules' => 'required|min_length[8]',
        ],
    ];
    
    protected $validationMessages = [
        'state' => [
            'required' => 'The {field} is required.',
            'numeric' => 'The {field} must be numeric.',
            'min_length' => 'The {field} must be at least {param} characters long.',
            'max_length' => 'The {field} must not exceed {param} characters.',
        ],
        'city' => [
            'required' => 'The {field} is required.',
            'numeric' => 'The {field} must be numeric.',
            'min_length' => 'The {field} must be at least {param} characters long.',
            'max_length' => 'The {field} must not exceed {param} characters.',
        ],
        'postal_code' => [
            'required' => 'The {field} is required.',
            'numeric' => 'The {field} must be numeric.',
            'min_length' => 'The {field} must be at least {param} characters long.',
            'max_length' => 'The {field} must not exceed {param} characters.',
        ],
        'address' => [
            'required' => 'The {field} is required.',
            'min_length' => 'The {field} must be at least {param} characters long.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function beforeInsert(array $data)
	{	
	}

	protected function passwordHash(array $data)
	{
	}

    public function getAddressByUserId($userId)
    {
        return $this->select('id,user_id,country,state,city,address,postal_code')
                ->where('user_id', $userId)
                ->first();
    }

    public function updateOrCreateAddress($userId, $data)
    {
        $existingAddress = $this->where('user_id', $userId)->first();
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($existingAddress) {
            return $this->update($existingAddress['id'], $data);
        } else {
            $data['user_id'] = $userId;
            $insertResult = $this->insert($data);
            // Check if the insert operation was successful
            if ($insertResult === false) {
                // Get the last database error
                $dbError = $this->errors();
                 echo 'Insert failed: ' . implode(', ', $dbError);
                 die; // Stop execution for debugging
            }  
        }
    }
}
// $db = \Config\Database::connect();
// // Get the last executed query
// $lastQuery = $db->getLastQuery();
// echo $lastQuery; // Print the last executed query
// die; // Stop execution for debugging