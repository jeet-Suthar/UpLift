<?php

namespace App\Validation;

use App\Models\UsersModel;

class UserRules
{


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
}
