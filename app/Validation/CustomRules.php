<?php

namespace App\Validation;

use CodeIgniter\Validation\Rules\AbstractRule;

class CustomRules
{
    public function validate_gender(string $value, string $rule, array $data = null, string $field = null): bool
    {
        $allowedValues = ['Male', 'Female', 'Other'];
        return in_array($value, $allowedValues);
    }
    public function is_valid_phone($value, string &$error = null): bool
    {
        if (preg_match('/^\+\d{1,3}\d{9,15}$/', $value)) {
            return true;
        } else {
            $error = 'The {field} is not a valid phone number.';
            return false;
        }
    }
    public function validate_file_type(string $value, string $rule, array $data = null, string $field = null): bool
    {
        $allowedValues = ['IMAGE', 'PDF', 'DOC', 'DOCX'];
        return in_array($value, $allowedValues);
    }
}
