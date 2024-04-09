<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields    = ['fname', 'lname', 'email', 'user_password', 'profile_dp', 'background_img', 'bio', 'birth_date', 'anonymous_username', 'anonymous_profile_dp', 'username'];

    protected $beforeInsert   = ['beforeInsertPassword']; //if new password is inserted it will be hashed and then inserted in db
    protected $beforeUpdate   = ['beforeUpdatePassword']; //same


    //getting user information just using userId variable
    public function getUserInfo($userId)
    {
        $query = $this->select('user_id,fname,lname, username, profile_dp', FALSE)
            ->where('user_id', $userId)
            ->first();

        return $query;
    }
    public function getUserProfileInfo($userId)
    {
        $query = $this->select('user_id,fname,lname, username, profile_dp,bio,background_img', FALSE)
            ->where('user_id', $userId)
            ->first();

        return $query;
    }

    protected function beforeInsertPassword(array $data)
    {
        $data = $this->hashPassword($data);
        return $data;
    }

    protected function beforeUpdatePassword(array $data)
    {
        $data = $this->hashPassword($data);
        return $data;
    }

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['user_password']))
            $data['data']['user_password'] = password_hash($data['data']['user_password'], PASSWORD_DEFAULT);
        return $data;
    }

    // Dates
    // protected $useTimestamps = true;
    // protected $dateFormat    = 'timestamp';
    // protected $createdField  = 'join_date';
    // protected $updatedField  = 'last_login';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
