<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HabitsModel;
use App\Models\UserHabitPercentageModel;
use App\Models\UserRewardViewModel;
use App\Models\UsersModel;
use App\Models\HabitSentModel;

use CodeIgniter\API\ResponseTrait;


class HabitController extends BaseController
{
    use ResponseTrait;
    protected $db;

    public function __construct()
    {
        // Load the database
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        //
    }

    public function habit()
    {
        $habits = new HabitsModel();
        $UserRewards = new UserRewardViewModel();

        $UserHabitPercentage = new UserHabitPercentageModel();
        $currentUserId = session()->get('id'); //this will have user_id of current user which is logged in 

        $data['habits'] = $habits->where('user_id', $currentUserId)->findAll();
        $data['rewards'] = $UserRewards->where('user_id', $currentUserId)->findAll();
        // $data['percentage'] = $UserHabitPercentage->where('user_id', $currentUserId)->findAll();
        // echo "<pre>";
        // print_r($data);
        echo view('components/habits/habit', $data);
    }

    public function verifier_dialog()
    {
        echo view("components/habits/verifierDialog");
    }

    public function get_verifiers_of($userId)
    {
        $userModel = new UsersModel();
        $habitModel = new HabitsModel();
        $i = 0; //taken for for each loop

        $data0['users'] = $habitModel->getVerifiersrOf($userId);
        // users array will have sub array as friend_id becuase in database query we are selecting friend_id 

        $data['type'] = "verifier";
        if (!empty($data0['users'])) {
            // for each user_id we have to fetch data of profile_info from user model
            foreach ($data0['users'] as $U) {
                $data['profile_info'][$i] = $userModel->getUserInfo($U['verifier_id']);
                //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
                $i++; //increment of index
            }
            echo view("components/site_essentials/userBlock.php", $data);
        } else {
            echo '<p style="text-align:center;"> No Verifiers </p>';
        }
    }

    public function new_verifier()
    {
        $userId = session()->get('id');
        $userModel = new UsersModel();
        $habitModel = new HabitsModel();
        $i = 0; //taken for for each loop

        $data0['users'] = $habitModel->newVerifier($userId);
        // users array will have sub array as friend_id becuase in database query we are selecting friend_id 

        $data['type'] = "newVerifier";
        if (!empty($data0['users'])) {
            // for each user_id we have to fetch data of profile_info from user model
            foreach ($data0['users'] as $U) {
                $data['profile_info'][$i] = $userModel->getUserInfo($U['friend_id']);
                //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
                $i++; //increment of index
            }
            echo view("components/site_essentials/userBlock.php", $data);
        } else {
            echo '<p style="text-align:center;"> No more friends to add </p>';
        }
    }

    public function remove_verifier()
    {
        // Get the array of verifier IDs sent from the client-side
        $verifierIds = $this->request->getPost('verifierIds');
        // $verifierIds = json_decode($this->request->getPost('verifierIds'), true);

        // Get the user ID from the session
        $userId = session()->get('id');

        // Perform SQL queries to delete verifier IDs associated with the current user
        foreach ($verifierIds as $verifierId) {

            $this->db->table('habit_verifier')
                ->where('user_id', $userId)
                ->where('verifier_id', $verifierId)
                ->delete();
        }
        // Respond with success message
        return $this->respond(['message' => 'Verifiers removed successfully'], 200);
    }

    public function add_verifier()
    {
        // Get the array of verifier IDs sent from the client-side
        $verifierIds = $this->request->getPost('verifierIds');
        // $verifierIds = json_decode($this->request->getPost('verifierIds'), true);

        // Get the user ID from the session
        $userId = session()->get('id');

        // Perform SQL queries to delete verifier IDs associated with the current user
        foreach ($verifierIds as $verifierId) {

            $data = [];
            $data = [
                'user_id' => $userId,
                'verifier_id' => $verifierId
            ];

            $this->db->table('habit_verifier')->insert($data);
        }
        // Respond with success message
        return $this->respond(['message' => 'Verifiers added successfully'], 200);
    }

    //*-------------validation section-------------
    public function validation_form_of_habit($habitId)
    {
        $data['habit_id'] = $habitId; // this will send habit-id to sent btn's data attribute
        echo view("components/habits/habitValidate", $data);
    }

    public function habit_sent()
    {

        if ($this->request->is('post')) {


            // Validate and handle file upload
            $mediaFile = $this->request->getFile('media');


            //for getting type of file (image/video

            $temp = $mediaFile->getMimeType();
            $temparray = explode("/", $temp);
            $type = $temparray[0];
            echo $type;

            $data = [
                'user_id' => session()->get('id'),
                'habit_id' => $this->request->getPost('habit_id'),
                'type' => $type,
            ];

            if ($mediaFile->isValid() && !$mediaFile->hasMoved()) {
                $newName = $mediaFile->getRandomName();
                $mediaFile->move('uploads/habits/habit_sent/' . $type, $newName);
                $data['media'] = $newName;

                $model = new HabitSentModel();
                $model->save($data);
            }
        }
    }

    //*----------------verificaton tasks--------------

    public function get_verification_task()
    {
        $userId = session()->get('id');
        $userModel = new UsersModel();
        $habitModel = new HabitsModel();
        $i = 0; //taken for for each loop

        $data['users'] = $habitModel->verificationTaskOf($userId);
        // users array will have sub array as friend_id becuase in database query we are selecting friend_id 

        $data['type'] = "verification_task";
        if (!empty($data['users'])) {
            // for each user_id we have to fetch data of profile_info from user model
            foreach ($data['users'] as $U) {
                $data['profile_info'][$i] = $userModel->getUserInfo($U['applicant_id']);
                //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
                $i++; //increment of index
            }
            echo view("components/site_essentials/userBlock.php", $data);
        } else {
            echo '<p style="text-align:center;"> No tasks </p>';
        }
    }

    public function verification_task_dialog($habitId)
    {
        $data['habit_id'] = $habitId; // this will send habit-id to sent btn's data attribute
        echo view("components/habits/habitValidate", $data);
    }

    public function verification_task_sent_of_user($applicantId)
    {
        $userId = session()->get('id');
        $userModel = new UsersModel();
        $habitModel = new HabitsModel();
        $i = 0; //taken for for each loop

        $data['taskData'] = $habitModel->verification_task_sent_of_user($userId, $applicantId);
        // users array will have sub array as friend_id becuase in database query we are selecting friend_id 

        // echo "<pre>";
        // print_r($data);
        echo view('components/habits/verificationTaskDialog', $data);

        // if (!empty($data0['users'])) {
        //     // for each user_id we have to fetch data of profile_info from user model
        //     foreach ($data0['users'] as $U) {
        //         $data['profile_info'][$i] = $userModel->getUserInfo($U['applicant_id']);
        //         //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
        //         $i++; //increment of index
        //     }
        //     echo view("components/site_essentials/userBlock.php", $data);
        // } else {
        //     echo '<p style="text-align:center;"> No Verifiers </p>';
        // }
    }

    public function verfication_done($habitId, $sentTime, $status)
    {


        // Get the user ID from the session
        $userId = session()->get('id');

        $habitModel =  new HabitsModel();

        // this will insert row in habit_verification table 
        // then percentage and habit completed will be calculated by trigger function
        $habitModel->addInHabitVerification($userId, $habitId, $sentTime, $status);


        // will update status of task of user
        // $habitModel->updateStatus($sentTime, $status);


        // return $this->respond(['message' => 'Verifiers removed successfully'], 200);
    }
}
