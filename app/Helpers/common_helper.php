<?php
use CodeIgniter\Database\Exceptions\DataException;

//Generate Unique Member Id
if (!function_exists('generate_unique_member_id')) {
    function generate_unique_member_id($table)
    {
        $db = \Config\Database::connect();
        $memberId = '';

        do {
            if($table=='drs_patients'):
                $memberPrefix = 'PAT';
            elseif($table=='drs_doctors'):
                $memberPrefix = 'DR';
            elseif($table=='drs_partners'):
                $memberPrefix = 'PART';
            endif;
            $memberId = generate_member_id($memberPrefix);
            $query = $db->table($table)->where('member_id', $memberId)->get();
        } while ($query->getNumRows() > 0);

        return $memberId;
    }
}
//Generate Member Id
if (!function_exists('generate_member_id')) {
    function generate_member_id($memberPrefix)
    {
        return $memberPrefix . strtoupper(bin2hex(random_bytes(4)));
    }
}
//Generate Unique Incremental value with column
if (!function_exists('generate_incrementing_value')) {
    function generate_incrementing_value($table, $column, $prefix)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        // Get the highest value in the column that starts with the prefix
        $builder->selectMax($column, 'max_value');
        $builder->like($column, $prefix, 'after');
        $query = $builder->get();
        $result = $query->getRow();
        $maxValue = isset($result->max_value) ? $result->max_value : null;
        if ($maxValue) {
            $number = (int) substr($maxValue, strlen($prefix));
            $newNumber = $number + 1;
        } else {
            $newNumber = 1;
        }
        return $prefix . $newNumber;
    }
}
//Remove all spaces and special characters from a string.
if (!function_exists('sanitize_string')) {
    function sanitize_string($text)
    {
        $sanitized = preg_replace('/[^A-Za-z0-9]/', '', $text);
        return $sanitized;
    }
}
//Get All Country Codes
if (!function_exists('get_country_code_list')) {
    function get_country_code_list()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('drs_countries');
        $builder->select('country_id, country_name, short_name, country_code, country_code, flag');
        $builder->where('status', 'active');
        //$builder->orderBy('display_order', 'ASC');
        $query = $builder->get();
        if ($query->getResult()) {
            $countryCodes = [];
            foreach ($query->getResult() as $row) {
                $countryCodes[] = [
                    'country_id'   => $row->country_id,
                    'country_name' => $row->country_name,
                    'short_name'   => $row->short_name,
                    'country_code' => $row->country_code,
                    'country_code' => $row->country_code,
                    'flag'         => $row->flag,
                ];
            }
            return $countryCodes;
        } else {
            return [];
        }
    }
}
//Get All Timezone
if (!function_exists('get_time_zones')) {
    function get_time_zones()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('drs_timezones');
        $builder->select('id, name, time_zone');
        $builder->where('status', 1);
        //$builder->orderBy('display_order', 'ASC');
        $query = $builder->get();
        if ($query->getResult()) {
            $timeZones = [];
            foreach ($query->getResult() as $row) {
                $timeZones[] = [
                    'id'        => $row->id,
                    'name'      => $row->name,
                    'time_zone' => $row->time_zone,
                ];
            }
            return $timeZones;
        } else {
            return [];
        }
    }
}
//Get All Languages List
if (!function_exists('get_languages_list')) {
    function get_languages_list()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('drs_languages');
        $builder->select('id, name, language_code');
        $builder->where('status', 1);
        $builder->orderBy('name', 'ASC');
        $query = $builder->get();
        $languageList = $query->getResultArray();
        if($languageList) {
            return $languageList;
        } else {
            return [];
        }
    }
}
//Get language by id
if (!function_exists('get_languages_by_id')) {
    function get_languages_by_id(array $ids)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('drs_languages');
        $builder->select('*');
        $builder->whereIn('id', $ids);
        // To get the compiled select query as a string
        $sql = $builder->getCompiledSelect();
        echo $sql;
    }
}
//Get All Specialization List
if (!function_exists('get_specialization_list')) {
    function get_specialization_list()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('drs_specializations');
        $builder->select('id, specialization, specialization_prefix');
        $builder->where('status', 1);
        $builder->orderBy('specialization', 'ASC');
        $query = $builder->get();
        $languageList = $query->getResultArray();
        if($languageList) {
            return $languageList;
        } else {
            return [];
        }
    }
}
//Get Specialization by id`s
if (!function_exists('get_specialization_by_id')) {
    function get_specialization_by_id(array $ids)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('drs_specializations');
        $builder->select('id, specialization, specialization_prefix');
        $builder->whereIn('id', $ids);
        // To get the compiled select query as a string
        $sql = $builder->getCompiledSelect();
        echo $sql;
    }
}
//Get Country Code By Country Id
if (!function_exists('get_country_code')) {
    function get_country_code($ccid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('drs_countries');
        $builder->select('country_code');
        $builder->where('country_id', $ccid);
        $query = $builder->get()->getRow(); // Get a single row
        
        if ($query) {
            return $query->country_code;
        } else {
            return null; // Or handle the case where no data is found
        }
    }
}
if (!function_exists('get_country_name_by_id')) {
    function get_country_name_by_id($countryId){
        $db = \Config\Database::connect();
        $builder = $db->table('drs_countries');
        $builder->select('country_id, country_name, short_name, country_code, country_code, flag');
        $builder->where('country_id', $countryId);
        return $builder->get()->getRowArray();
    }
}
if (!function_exists('get_states_by_country_id')) {
    function get_states_by_country_id($countryId){
        $db = \Config\Database::connect();
        $builder = $db->table('drs_states');
        $builder->select('state_id, name');
        $builder->where([
            'country_id' => $countryId,
            'status' => 'active'
        ]);
        return $builder->get()->getResultArray();
    }
}
if (!function_exists('get_city_list_by_states_id')) {
    function get_city_list_by_states_id($stateId){
        $db = \Config\Database::connect();
        $builder = $db->table('drs_cities');
        $builder->select('id,state_id, name');
        $builder->where([
            'state_id' => $stateId,
            'status'   => 1
        ]);
        return $builder->get()->getResultArray();
    }
}
//Get USer Details By $type = Email,Phone,Type
if (!function_exists('get_user_details')) {
    function get_user_details($emailPhone,$dataBy,$userType)
    {
        $db = \Config\Database::connect();
        if($userType=='patient'){
            $builder = $db->table('drs_patients');
            $builder->select('user_id, role, member_id, first_name, last_name, email, country_code, country_id, phone, time_zone, dob, gender, profile_pic');
        } elseif($userType=='doctor'){
            $builder = $db->table('drs_doctors');
            $builder->select('user_id, role, member_id, first_name, last_name, doctor_url_name, email, country_code, country_id, phone, time_zone, dob, gender, about');
        } elseif($userType=='partner'){ 
            $builder = $db->table('drs_partners');
            $builder->select('user_id, role, member_id, company_name, company_contact_name, company_url_name, email, country_code, country_id, phone, time_zone');
        } else {
            return 'error';
        }
        
        if($dataBy=='email'){
            $builder->where('email', $emailPhone);
        } elseif($dataBy=='phone'){
            $builder->where('phone', $emailPhone);
        } elseif($dataBy=='partner'){ 
            $builder->where('country_id', $emailPhone);
        } else {
            return null;
        }

        $query = $builder->get()->getRowArray(); // Get a single row
        
        if ($query) {
            return $query;
        } else {
            return null; // Or handle the case where no data is found
        }
    }
    //Get Url Name of Doctor or Partner
if (!function_exists('get_url_name')) {
    function get_url_name($email,$urlNameFor)
    {
        $db = \Config\Database::connect();
        if($urlNameFor=='doctor'){
            $builder = $db->table('drs_doctors');
            $builder->select('doctor_url_name');
        }
        if($urlNameFor=='partner'){
            $builder = $db->table('drs_partners');
            $builder->select('company_url_name');
        }
        $builder->where('email', $email);
        $query = $builder->get()->getRow(); // Get a single row
        
        if ($query AND $urlNameFor=='doctor') {
            return $query->doctor_url_name;
        } elseif ($query AND $urlNameFor=='partner') {
            return $query->company_url_name;
        } else {
            return null; // Or handle the case where no data is found
        }
    }
}
}
//Get Current Controller and Function or Method
if (!function_exists('get_current_controller_method')) {
    function get_current_controller_method()
    {
        $router = service('router');
        return [
            'controller' => $router->controllerName(),
            'method'     => $router->methodName(),
        ];
    }
}
if (!function_exists('find_service_type_key')) {
    function find_service_type_key($array, $serviceType) {
        foreach ($array as $key => $value) {
            if (isset($value['service_type']) && $value['service_type'] === $serviceType) {
                return $key;
            }
        }
        return false;
    }
}
