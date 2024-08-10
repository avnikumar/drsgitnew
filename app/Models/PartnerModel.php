<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'drs_partners';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "role",
        "member_id",
        "company_name",
        "company_contact_name",
        "company_url_name",
        "country_code",
        "country_id",
        "phone",
        "time_zone",
        "email",
        "email_verified_at",
        "gst_number",
        "pan_number",
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
    protected $validationRules      = [];
    protected $validationMessages   = [];
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
}
