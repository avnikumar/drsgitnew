<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientLanguageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drs_patient_languages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 
        'specialization_id'
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
        'specialization_id' => [
            'label' => 'Language Id',
            'rules' => 'required|numeric|min_length[1]|max_length[5]',
        ]
    ];
    
    protected $validationMessages = [
        'user_id' => [
            'required' => 'The {field} is required.',
            'numeric' => 'The {field} must be numeric.',
            'min_length' => 'The {field} must be at least {param} characters long.',
            'max_length' => 'The {field} must not exceed {param} characters.',
        ],
        'specialization_id' => [
            'required' => 'The {field} is required.',
            'numeric' => 'The {field} must be numeric.',
            'min_length' => 'The {field} must be at least {param} characters long.',
            'max_length' => 'The {field} must not exceed {param} characters.',
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

    public function getLanguagesByUserId($userId)
    {
        return $this->select('id, user_id, language_id')
                    ->where('user_id', $userId)
                    ->findAll();
    }

    public function updateLanguages($userId, $data)
    {
        // Delete existing languages for the user
        $this->where('user_id', $userId)->delete();
        // Insert new languages in batch
        if ($this->insertBatch($data) === false) {
            $dbError = $this->errors();
            echo 'Insert failed: ' . implode(', ', $dbError);
            die;
        }
    }
}
