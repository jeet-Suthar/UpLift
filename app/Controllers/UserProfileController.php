<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class UserProfileController extends BaseController
{
    public function index()
    {
        //
        echo view("profile");
    }
    public function user_profile($userId)
    {
        $userModel = new UsersModel;
        $data['profile_info'] = $userModel->getUserProfileInfo($userId);
        // echo "<pre>";
        // print_r($data);

        echo view("profile", $data);
    }
}
