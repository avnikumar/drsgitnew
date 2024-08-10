<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorLanguageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drs_doctor_languages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 
        'language_id'
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
        'language_id' => [
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
        'language_id' => [
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
        return $this->select('drs_doctor_languages.id, drs_doctor_languages.user_id, drs_doctor_languages.language_id, languages.name as language_name')
                    ->join('languages', 'languages.id = drs_doctor_languages.language_id')
                    ->where('drs_doctor_languages.user_id', $userId)
                    ->findAll();
    }

    public function updateLanguages($userId, $data)
    {
        $existingLanguages = $this->where('user_id', $userId)->findAll();
        $existingLanguageIds = array_column($existingLanguages, 'language_id');

        // Delete languages that are not in the new data
        $newLanguageIds = array_column($data, 'language_id');
        $languagesToDelete = array_diff($existingLanguageIds, $newLanguageIds);
        if (!empty($languagesToDelete)) {
            $this->where('user_id', $userId)->whereIn('language_id', $languagesToDelete)->delete();
        }

        // Insert new languages that are not in the existing data
        $languagesToInsert = array_filter($data, function($language) use ($existingLanguageIds) {
            return !in_array($language['language_id'], $existingLanguageIds);
        });

        if (!empty($languagesToInsert)) {
            //$this->insertBatch($languagesToInsert);
            if ($this->insertBatch($languagesToInsert) === false) {
                $dbError = $this->errors();
                echo 'Insert failed: ' . implode(', ', $dbError);
                die;
            }
        }
              
        // $this->where('user_id', $userId)->delete();
        // // Insert new languages in batch
        // if ($this->insertBatch($data) === false) {
        //     $dbError = $this->errors();
        //     echo 'Insert failed: ' . implode(', ', $dbError);
        //     die;
        // }
    }

    public function addLanguage($userId, $languageId)
    {
       $existingRecord = $this->where(['user_id' => $userId, 'language_id' => $languageId])->first();
       if (!$existingRecord) {
           $this->insert(['user_id' => $userId, 'language_id' => $languageId]);
           return true; // Indicate that the record was inserted
       }
       return false; // Indicate that the record already exists
    }
    
    public function removeLanguage($userId, $languageId)
    {
        $existingRecord = $this->where(['user_id' => $userId, 'language_id' => $languageId])->first();
        if ($existingRecord) {
            $result = $this->delete($existingRecord['id']);
            return $result;
        } else {
            return 0; // Indicate that no matching record was found to delete
        }
    }
}
