<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorDocumentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drs_doctor_document';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "user_id",
        "column_name",
        "file_name",
        "file_type",
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
        'column_name' => [
            'label' => 'Column Name',
            'rules' => 'required|min_length[5]',
        ],
        'file_name' => [
            'label' => 'File Name',
            'rules' => 'required|min_length[2]',
        ],
        'file_type' => [
            'label' => 'File Type',
            'rules' => 'required|validate_file_type[IMAGE, PDF, DOC, DOCX]',
        ],
    ];
    protected $validationMessages = [
        'column_name' => [
            'required' => 'The {field} is required.',
            'min_length' => 'The {field} must be at least {param} characters long.',
        ],
        'file_name' => [
            'required' => 'The {field} is required.',
            'min_length' => 'The {field} must be at least {param} characters long.',
        ],
        'file_type' => [
            'required' => 'The {field} is required.',
            'validate_file_type' => '{field} should be IMAGE, PDF, DOC, DOCX.',
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

    public function getDocumentByUserId($userId)
    {
        return $this->select('id,user_id,column_name,file_name,file_type')
            ->where('user_id', $userId)
            ->findAll();
    }
    //Here colum is table column name
    public function getDocumentByColumnId($column, $userId)
    {
        return $this->select('id, user_id, column_name, file_name, file_type')
            ->where(['user_id' => $userId, 'column_name' => $column])
            ->first();
    }

    public function updateOrCreateDocument($userId, $data)
    {
        // Fetch the existing document
        $existingDocument = $this->where(['user_id' => $userId, 'column_name' => $data['column_name']])->first();
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($existingDocument) {
            if (!empty($existingDocument['file_name'])) {
                // Delete the existing image file from the server
                $imagePath = FCPATH . 'public/uploads/doctor/document/' . $existingDocument['file_name'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            return $this->update($existingDocument['id'], $data);
        } else {
            $insertResult = $this->insert($data);
            if ($insertResult === false) {
                // Get the last database error
                $dbError = $this->errors();
                echo 'Insert failed: ' . implode(', ', $dbError);
                die; // Stop execution for debugging
            } else {
                return true;
            }
        }
    }
}
// $db = \Config\Database::connect();
// // Get the last executed query
// $lastQuery = $db->getLastQuery();
// echo $lastQuery; // Print the last executed query
// die; // Stop execution for debugging