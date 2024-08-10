<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorServiceRateModel extends Model
{
    protected $table = 'doctor_service_rate';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'service_type',
        'service_price',
        'service_time',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Optional: You can add validation rules here
    protected $validationRules = [
        'user_id'        => 'required|integer',
        'service_type'   => 'required|in_list[ONLINECALL,HOUSECALL,CLINICVISIT]',
        'service_price'  => 'required|integer|max_length[4]',
        'service_time'   => 'required|integer|max_length[2]',
        'status'         => 'required|in_list[0,1]',
    ];
    
    protected $validationMessages = [
        'user_id' => [
            'required' => 'User ID is required.',
            'integer'  => 'User ID must be an integer.',
        ],
        'service_type' => [
            'required' => 'Service type is required.',
            'in_list'  => 'Service type must be one of the following: ONLINECALL, HOUSECALL, CLINICVISIT.',
        ],
        'service_price' => [
            'required'    => 'Service price is required.',
            'integer'     => 'Service price must be an integer.',
            'max_length'  => 'Service price cannot exceed 4 digits.',
        ],
        'service_time' => [
            'required'    => 'Service time is required.',
            'integer'     => 'Service time must be an integer.',
            'max_length'  => 'Service time cannot exceed 2 digits.',
        ],
        'status' => [
            'required' => 'Status is required.',
            'integer'  => 'Status must be an integer.',
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

    public function updateOrCreateServiceRate($userId, array $data)
    {
        $existingService = $this->where(['user_id'=> $userId, 'service_type'=>$data['service_type']])->first();
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($existingService) {
            // Update existing service
            return $this->update($existingService['id'], $data);
        } else {
            // Create new service
            $data['user_id'] = $userId;
            $insertResult = $this->insert($data);
            // Check if the insert operation was successful
            if ($insertResult === false) {
                // Get the last database error
                $dbError = $this->errors();
                echo 'Insert failed: ' . implode(', ', $dbError);
                die; // Stop execution for debugging
            }
            return $insertResult; // Return the ID of the newly created service
        }
    }
    public function getAllServiceRateByUserId($userId)
    {
        return $this->where('user_id', $userId)
                ->findAll();
    }
    public function getServiceRateByServiceType($userId, $serviceType)
    {
        return $this->where('user_id', $userId)
                    ->where('service_type', $serviceType)
                    ->first();
    }
}
