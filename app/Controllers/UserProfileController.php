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
        $ownerId = session()->get("id");


        $status = 'follow'; //by default status will be follow for all acc

        // for finding if given profile's owner is our friend
        $arr1 = $friendModel->findFriends($userId);


        foreach ($arr1 as $subArray) {
            // Check if the value exists in the current sub-array
            if (in_array($ownerId, $subArray)) {
                // Set the flag to true and break out of the loop
                $status = 'friends';
                break;
            }
        }

        // finding if we following them
        $arr2 = $friendModel->findFriendRequestOf($userId);

        foreach ($arr2 as $subArray) {
            // Check if the value exists in the current sub-array
            if (in_array($ownerId, $subArray)) {
                // Set the flag to true and break out of the loop
                $status = 'following';
                break;
            }
        }

        // echo $status;
        $data['status'] = $status;
        echo view("profile", $data);
    }
    public function edit_profile_form()
    {
        echo view('components/site_essentials/editProfileForm');
    }

    public function profile_update()
    {
        $userId = session()->get('id');

        // Retrieve old filenames from the database
        $userModel = new UsersModel();
        $userData = $userModel->find($userId);
        $oldProfileDpName = $userData['profile_dp'];
        $oldBackgroundImgName = $userData['background_img'];

        // Upload profile picture
        $profileDp = $this->request->getFile('profile_dp');
        $newProfileDpName = null;
        if ($profileDp->isValid() && !$profileDp->hasMoved()) {
            $newProfileDpName = $profileDp->getRandomName();
            $profileDp->move('uploads/assets/user/user_pfp/', $newProfileDpName);

            // Delete old profile picture
            if ($oldProfileDpName && file_exists('uploads/assets/user/user_pfp/' . $oldProfileDpName)) {
                unlink('uploads/assets/user/user_pfp/' . $oldProfileDpName);
            }
        }

        // Upload background image
        $backgroundImg = $this->request->getFile('background_img');
        $newBackgroundImgName = null;
        if ($backgroundImg->isValid() && !$backgroundImg->hasMoved()) {
            $newBackgroundImgName = $backgroundImg->getRandomName();
            $backgroundImg->move('uploads/assets/user/user_background_pic/', $newBackgroundImgName);

            // Delete old background image
            if ($oldBackgroundImgName && file_exists('uploads/assets/user/user_background_pic/' . $oldBackgroundImgName)) {
                unlink('uploads/assets/user/user_background_pic/' . $oldBackgroundImgName);
            }
        }

        // Prepare updated data for the database
        $userData = [];
        if (!is_null($newProfileDpName)) {
            $userData['profile_dp'] = $newProfileDpName;
        }
        if (!is_null($newBackgroundImgName)) {
            $userData['background_img'] = $newBackgroundImgName;
        }
        $userData['bio'] = $this->request->getVar('bio');

        // Update user's profile in the database
        $userModel->update($userId, $userData);

        return redirect()->to(base_url('uplift'));
    }

    public function follow_user($userId)
    {
        $friendModel = new FriendsModel;
        $friendModel->followUser($userId);
    }
    public function unfollow_user($userId)
    {
        $friendModel = new FriendsModel;
        $friendModel->unFollowUser($userId);
    }
}
