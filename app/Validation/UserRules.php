<?php

namespace App\Validation;

use App\Models\UsersModel;

class UserRules
{

    // custom rules to check password match along with encyrption converiosn
    public function validate_user(string $str, string $fields, array $data)
    {
        $model = new UsersModel;

        //for users email extraction from db
        $user = $model->where('email', $data['email'])->first();

        //if query returned zero row then it will be false
        if (!$user)
            return false;

        // $user['user_password'] == $data['user_password']? return true: return false;
        if (!password_verify($data['user_password'], $user['user_password']))
            return false;
    }

    // custom rule to check whether email is registered or not
    public function is_unique_email(string $str, string $fields, array $data): bool
    {
        $model = new UsersModel();

        // Extract table and field name from the provided $fields string
        [$table, $field] = explode('.', $fields);

        // Check if the email exists in the specified table and field
        $result = $model->where($field, $str)->countAllResults($table);

        // If email is not registered, return false
        return !($result === 0);
    }

    public function strict_valid_email(string $str): bool
    {
        return (bool) filter_var($str, FILTER_VALIDATE_EMAIL);
    }
}
