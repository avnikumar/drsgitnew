<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorSpecializationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'doctor_specializations';
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
            'label' => 'Specialization Id',
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

    public function getSpecializationByUserId($userId)
    {
        return $this->select('doctor_specializations.id, doctor_specializations.user_id, drs_doctor_specializations.specialization_id, specializations.specialization,specializations.specialization_prefix')
                    ->join('specializations', 'specializations.id = doctor_specializations.specialization_id')
                    ->where('doctor_specializations.user_id', $userId)
                    ->findAll();
    }

    public function updateSpecialization($userId, $data)
    {
        $existingSpecializations = $this->where('user_id', $userId)->findAll();
        $existingSpecializationIds = array_column($existingSpecializations, 'specialization_id');

        // Delete Specialization that are not in the new data
        $newLanguageIds = array_column($data, 'specialization_id');
        $specializationToDelete = array_diff($existingSpecializationIds, $newLanguageIds);
        if (!empty($specializationToDelete)) {
            $this->where('user_id', $userId)->whereIn('specialization_id', $specializationToDelete)->delete();
        }

        // Insert new Specialization that are not in the existing data
        $specializationToInsert = array_filter($data, function($language) use ($existingSpecializationIds) {
            return !in_array($language['specialization_id'], $existingSpecializationIds);
        });

        if (!empty($specializationToInsert)) {
            //$this->insertBatch($specializationToInsert);
            if ($this->insertBatch($specializationToInsert) === false) {
                $dbError = $this->errors();
                echo 'Insert failed: ' . implode(', ', $dbError);
                die;
            }
        }
                
        // $this->where('user_id', $userId)->delete();
        // // Insert new specialization in batch
        // if ($this->insertBatch($data) === false) {
        //     $dbError = $this->errors();
        //     echo 'Insert failed: ' . implode(', ', $dbError);
        //     die;
        // }
    }

    public function addSpecialization($userId, $specializationId)
    {
        $existingRecord = $this->where(['user_id' => $userId, 'specialization_id' => $specializationId])->first();
        if (!$existingRecord) {
            $this->insert(['user_id' => $userId, 'specialization_id' => $specializationId]);
            return true; // Indicate that the record was inserted
        }
        return false; // Indicate that the record already exists
    }
    
    public function removeSpecialization($userId, $specializationId)
    {
        $existingRecord = $this->where(['user_id' => $userId, 'specialization_id' => $specializationId])->first();
        if ($existingRecord) {
            $result = $this->delete($existingRecord['id']);
            return $result;
        } else {
            return 0; // Indicate that no matching record was found to delete
        }
    }
}
