<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorQualificationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drs_doctor_qualification';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 
        'qualification'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';

    // Validation
    protected $validationRules = [
        'user_id' => [
            'label' => 'User Id',
            'rules' => 'required|numeric|min_length[1]|max_length[4]',
        ],
        'qualification' => [
            'label' => 'Qualification',
            'rules' => 'required|min_length[2]|max_length[145]',
        ]
    ];
    
    protected $validationMessages = [
        'user_id' => [
            'required' => 'The {field} is required.',
            'numeric' => 'The {field} must be numeric.',
            'min_length' => 'The {field} must be at least {param} characters long.',
            'max_length' => 'The {field} must not exceed {param} characters.',
        ],
        'qualification' => [
            'required' => 'The {field} is required.',
            'min_length' => 'The {field} must be at least {param} characters long.',
        ]
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

    public function getQualificationByUserId($userId)
    {
        return $this->select('id, user_id, qualification')
                    ->where('user_id', $userId)
                    ->findAll();
    }

    public function updateQualification($userId, $data)
    {  
        $this->where('user_id', $userId)->delete();
        // Insert new qualification in batch
        if ($this->insertBatch($data) === false) {
            $dbError = $this->errors();
            echo 'Insert failed: ' . implode(', ', $dbError);
            die;
        }
    }

    public function addQualification($userId, $qualification)
    {
        $existingRecord = $this->where(['user_id' => $userId, 'qualification' => $qualification])->first();
        if (!$existingRecord) {
            $this->insert(['user_id' => $userId, 'qualification' => $qualification]);
            return true; // Indicate that the record was inserted
        }
        return false; // Indicate that the record already exists
    }
    
    public function removeQualification($userId, $qualification)
    {
        $existingRecord = $this->where(['user_id' => $userId, 'qualification' => $qualification])->first();
        if ($existingRecord) {
            $result = $this->delete($existingRecord['id']);
            return $result;
        } else {
            return 0; // Indicate that no matching record was found to delete
        }
    }
}
