<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\FriendsModel;

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
        $friendModel = new FriendsModel;
        $data['profile_info'] = $userModel->getUserProfileInfo($userId);
        // echo "<pre>";
        // print_r($data);
        $data['followerCount'] = $friendModel->followerCount($userId);
        $data['followingCount'] = $friendModel->followingCount($userId);


        echo view("profile", $data);
    }
}
