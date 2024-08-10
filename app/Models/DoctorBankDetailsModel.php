<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorBankDetailsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bank_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'full_name',
        'bank_name',
        'account_number',
        'ifsc_routing',
        'bank_address',
        'postal_code',
        'status',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat   = 'datetime';

    // Validation
    protected $validationRules = [
        'full_name' => [
            'label' => 'Full Name',
            'rules' => 'required|min_length[3]|max_length[100]',
        ],
        'bank_name' => [
            'label' => 'Bank Name',
            'rules' => 'required|min_length[3]|max_length[100]',
        ],
        'account_number' => [
            'label' => 'Account Number',
            'rules' => 'required|numeric|min_length[5]|max_length[20]',
        ],
        'ifsc_routing' => [
            'label' => 'IFSC/Routing Code',
            'rules' => 'required|min_length[5]|max_length[20]',
        ],
        'bank_address' => [
            'label' => 'Bank Address',
            'rules' => 'required|min_length[5]|max_length[255]',
        ],
        'postal_code' => [
            'label' => 'Postal Code',
            'rules' => 'required|numeric|min_length[5]|max_length[10]',
        ]
    ];
    
    protected $validationMessages = [
        
        'full_name' => [
            'required' => '{field} is required.',
            'min_length' => '{field} must be at least 3 characters long.',
            'max_length' => '{field} cannot exceed 100 characters.',
        ],
        'bank_name' => [
            'required' => '{field} is required.',
            'min_length' => '{field} must be at least 3 characters long.',
            'max_length' => '{field} cannot exceed 100 characters.',
        ],
        'account_number' => [
            'required' => '{field} is required.',
            'numeric' => '{field} must be a numeric value.',
            'min_length' => '{field} must be at least 5 characters long.',
            'max_length' => '{field} cannot exceed 20 characters.',
        ],
        'ifsc_routing' => [
            'required' => '{field} is required.',
            'min_length' => '{field} must be at least 5 characters long.',
            'max_length' => '{field} cannot exceed 20 characters.',
        ],
        'bank_address' => [
            'required' => '{field} is required.',
            'min_length' => '{field} must be at least 5 characters long.',
            'max_length' => '{field} cannot exceed 255 characters.',
        ],
        'postal_code' => [
            'required' => '{field} is required.',
            'numeric' => '{field} must be a numeric value.',
            'min_length' => '{field} must be at least 5 digits long.',
            'max_length' => '{field} cannot exceed 10 digits.',
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

    public function getBankDetailsByUserId($userId)
    {
        return $this->select('user_id, full_name, bank_name, account_number, ifsc_routing, bank_address, postal_code')
                    ->where('user_id', $userId)
                    ->first();
    }

    public function addBankDetails($userId, $data)
    {
        $existingBankDetails = $this->where('user_id', $userId)->first();
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($existingBankDetails) {
            return $this->update($existingBankDetails['id'], $data);
        } else {
            $data['user_id'] = $userId;
            $data['created_at'] = date('Y-m-d H:i:s');
            return $this->insert($data);
        }
    }

    public function removeBankDetails($userId)
    {
        $existingRecord = $this->where(['user_id' => $userId])->first();
        if ($existingRecord) {
            $result = $this->delete($existingRecord['id']);
            return $result;
        } else {
            return 0; // Indicate that no matching record was found to delete
        }
    }
}
