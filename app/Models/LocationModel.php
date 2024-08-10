<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'locations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'location_of',
        'country',
        'state',
        'city',
        'postal_code',
        'address',
        'status',
        'created_at',
        'updated_at',
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
    // Validation Rules
    protected $validationRules = [
        'state' => [
            'label' => 'State',
            'rules' => 'required|numeric',
        ],
        'city' => [
            'label' => 'City',
            'rules' => 'required|numeric',
        ],
        'postal_code' => [
            'label' => 'Postal Code',
            'rules' => 'required|numeric|min_length[5]|max_length[15]',
        ],
        'address' => [
            'label' => 'Address',
            'rules' => 'required|min_length[10]|max_length[500]',
        ]
    ];

    protected $validationMessages = [
        'state' => [
            'required' => '{field} is required.',
            'numeric' => '{field} must be a numeric value.',
        ],
        'city' => [
            'required' => '{field} is required.',
            'numeric' => '{field} must be a numeric value.',
        ],
        'postal_code' => [
            'required' => '{field} is required.',
            'numeric' => '{field} must be a numeric value.',
            'min_length' => '{field} must be at least 5 digits long.',
            'max_length' => '{field} cannot exceed 15 digits.',
        ],
        'address' => [
            'required' => '{field} is required.',
            'min_length' => '{field} must be at least 10 characters long.',
            'max_length' => '{field} cannot exceed 500 characters.',
        ]
    ];
    
    // Skip validation
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
    
    public function getLocationsAddedByUserId($userId)
    {
        //return $this->where('user_id', $userId)->findAll();
        return $this->select('locations.*, countries.country_name, states.name as state_name, cities.name as city_name')
        ->join('countries', 'countries.country_id = locations.country', 'left')
        ->join('states', 'states.state_id = locations.state', 'left')
        ->join('cities', 'cities.id = locations.city', 'left')
        ->where('locations.user_id', $userId)
        ->findAll();
    }

    public function getLocationById($id)
    {
        return $this->find($id);
    }
    
    public function updateOrCreateLocation($userId, array $data, $id = null)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($id) {
            $existingLocation = $this->where(['id' => $id, 'user_id' => $userId])->first();
            if ($existingLocation) {
                return $this->update($id, $data);
            } else {
                echo 'No location found with the specified ID for this user.';
                return false;
            }
        } else {
            $data['user_id'] = $userId;
            $insertResult = $this->insert($data);
            if ($insertResult === false) {
                // Get the last database error
                $dbError = $this->errors();
                echo 'Insert failed: ' . implode(', ', $dbError);
                die; // Stop execution for debugging
            }
            // Return the ID of the newly created location
            return $insertResult;
        }
    }

    public function deleteLocation($id)
    {
        return $this->delete($id);
    }
}
