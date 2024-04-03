<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FriendsModel;
use App\Models\UsersModel;

class FriendsController extends BaseController
{
    public function find_friends($userId)
    {
        $friendModel = new FriendsModel();
        $userModel = new UsersModel();
        $i = 0; //taken for for each loop

        // this will have user_id for friends so I have used $data0 bcoz it is temprorary
        $data0['users'] = $friendModel->findFriends($userId);
        // users array will have sub array as friend_id becuase in database query we are selecting friend_id 

        $data['type'] = "friend";
        if (!empty($data0['users'])) {
            // for each user_id we have to fetch data of profile_info from user model
            foreach ($data0['users'] as $U) {
                $data['profile_info'][$i] = $userModel->getUserInfo($U['friend_id']);
                //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
                $i++; //increment of index
            }
            echo view("components/site_essentials/userBlock.php", $data);
        } else {
            echo "No Friend in h1 tag";
        }
    }

    public function find_friend_request_of($userId)
    {
        $friendModel = new FriendsModel();
        $userModel = new UsersModel();
        $i = 0; //taken for for each loop


        $data0['users'] = $friendModel->findFriendRequestOf($userId);
        // users array will have sub array as user_id becuase in database query we are selecting user_id 

        $data['type'] = "request";
        if (!empty($data0['users'])) {
            // for each user_id we have to fetch data of profile_info from user model
            foreach ($data0['users'] as $U) {
                $data['profile_info'][$i] = $userModel->getUserInfo($U['user_id']);
                //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
                $i++; //increment of index
            }
            echo view("components/site_essentials/userBlock.php", $data);
        } else {
            echo "No requests in h1 tag";
        }
    }

    public function find_request_not_accepted_of($userId)
    {
        $friendModel = new FriendsModel();
        $data['users'] = $friendModel->findRequestNotAcceptedOf($userId);

        // echo "<pre>";
        // print_r($data);
        echo view("components/site_essentials/userBlock.php");
    }

    public function find_followers_of_User($userId)
    {
        $friendModel = new FriendsModel();
        $userModel = new UsersModel();
        $i = 0; //taken for for each loop


        $data0['users'] = $friendModel->findFollowersOfUser($userId);
        // users array will have sub array as user_id becuase in database query we are selecting user_id 

        $data['type'] = "follow";

        // this data2 array is send to topSectionOfFollow so that top bar can be displayed
        $data2['pageOwnerUserId'] = $userId;
        echo view("components/site_essentials/topSectionOfFollow.php", $data2);



        if (!empty($data0['users'])) {
            // for each user_id we have to fetch data of profile_info from user model
            foreach ($data0['users'] as $U) {
                $data['profile_info'][$i] = $userModel->getUserInfo($U['user_id']);
                //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
                $i++; //increment of index
            }
            echo view("components/site_essentials/userBlock.php", $data);
        } else {
            echo "No follower in h1 tag";
        }
    }

    public function find_followings_of_User($userId)
    {
        $friendModel = new FriendsModel();
        $userModel = new UsersModel();
        $i = 0; //taken for for each loop


        $data0['users'] = $friendModel->findFollowingsOfUser($userId);
        // users array will have sub array as user_id becuase in database query we are selecting user_id 

        $data['type'] = "follow";


        // this data2 array is send to topSectionOfFollow so that top bar can be displayed
        $data2['pageOwnerUserId'] = $userId;
        echo view("components/site_essentials/topSectionOfFollow.php", $data2);


        if (!empty($data0['users'])) {
            // for each user_id we have to fetch data of profile_info from user model
            foreach ($data0['users'] as $U) {
                $data['profile_info'][$i] = $userModel->getUserInfo($U['friend_id']);
                //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
                $i++; //increment of index
            }
            echo view("components/site_essentials/userBlock.php", $data);
        } else {
            echo "No following in h1 tag";
        }
    }
}
