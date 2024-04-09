<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\PostsModel;
use App\Models\HabitsModel;
use CodeIgniter\Validation\Validation;

class UpliftController extends BaseController
{

    protected $db;

    public function __construct()
    {
        // Load the database
        $this->db = \Config\Database::connect();
    }


    public function index()
    {
        return view('profile');
    }

    public function login()
    {
        $data = [];
        helper(['form']);

        //for get request we'll return only login view
        if ($this->request->is('get')) {
            return view('login');
        }

        //if req is post we perform validation and authentication
        else if ($this->request->is('post')) {
            $validation = \Config\Services::validation();

            $rule = [
                'email' => 'required|strict_valid_email|is_unique_email[users.email]',
                'user_password' => 'required|validate_user[email,password]'
            ];

            $errors = [
                'user_password' => [
                    'validate_user' => 'Incorrect password!',
                    'required' => 'Password required'
                ],
                'email' => [
                    'is_unique_email' => 'Email is not registered! Please sign up.',
                    'strict_valid_email' => 'Please enter a valid email address!'
                ]
            ];
        }


        if (!$this->validate($rule, $errors)) {
            $data['validation'] = $validation;

            return view('login', $data);
        } else {

            $model = new UsersModel;

            //for users email extraction from db
            $user = $model->where('email', $this->request->getPost('email'))->first();

            $userdata = [
                'id' => $user['user_id'],
                'email' => $user['email'],
                'isLoggedIn' => TRUE,
            ];
            session()->set($userdata);
            return redirect()->to(base_url('uplift'));
        }
    }

    /*
    * for signup process we accept two type of req -> get and post
    * for get req we'll just return signup page
    * for post we'll perform validation and enter data into database
    *
    */

    public function signup()
    {

        $data = [];
        helper(['form']);
        //for get req

        if ($this->request->is('get')) {
            return view('signup');
        }

        //for post req
        if ($this->request->is('post')) {
            $validation = \Config\Services::validation();

            //rules for validation of data
            $rule = [
                'email' => 'required|valid_email|is_unique[users.email]',
                'user_password' => 'required|min_length[6]|max_length[20]',
                'cpassword' => 'required|matches[user_password]',
                'fname' => 'required|min_length[2]|max_length[20]',
                'lname' => 'required|min_length[3]|max_length[20]',
                'username' => 'required|is_unique[users.username]'
            ];

            //custom error message for rules
            $errors = [
                'email' => [
                    'is_unique' => 'Email already exists, Try to login'
                ],
                'user_password' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password is too short',
                    'max_length' => 'Password is too long',
                ],
                'cpassword' => [
                    'required' => 'Confirmation of password is required',
                    'matches' => 'Password should be matching'
                ],
                'fname' => [
                    'min_length' => 'First name is too short',
                    'max_length' => 'First name is too long',
                ],
                'lname' => [
                    'min_length' => ':ast name is too short',
                    'max_length' => 'Last name is too long',
                ],
                'username' => [
                    'is_unique' => 'Username already exists',
                ]
            ];

            if (!$this->validate($rule, $errors)) {
                // $data['validation'] = $this->validator;
                $data['validation'] = $validation;

                return view('signup', $data);
            } else {

                //now if data is validated then we'll create data assosiative array where will store
                // column names of database will be same as assosiative array and value will be from post req

                $data = [
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'user_password' =>  $this->request->getPost('user_password')
                ];

                $model = new UsersModel;         //creating $user as UserModel object 

                //for saving data into the database
                $model->save($data);


                //now mddel is loaded and data is inserted in database now we can put this data in session 

                //first we query the result for getting user_id from database (i know we are doing two query 
                // consecutively but there is no other mean of getting user_id from database)

                //so following will be same as in login page


                $user = $model->where('email', $this->request->getPost('email'))->first();

                $userdata = [
                    'id' => $user['user_id'],
                    'email' => $user['email'],
                    'isLoggedIn' => TRUE,
                ];
                session()->set($userdata);
                return redirect()->to(base_url('uplift'));
            }
        }
    }

    public function logout()
    {



        print_r(session()->get('email'));
        session()->destroy();
        echo 'You have been logged out!!';
    }

    public function getUserIdOfOwner()
    {
        $data["userId"] = session()->get('id');
        echo json_encode($data);
    }
    public function uplift()
    {
        $userModel = new UsersModel();
        $userId = session()->get('id');
        $data['profile_info'] = $userModel->getUserInfo($userId);



        echo view('template/navbar', $data);
        echo view('uplift');
    }

    public function post_form_old(): string
    {
        return view('post_form');
    }

    //for submiting posts


    public function submitPost()
    {
        $userModel = new UsersModel();

        // Handle the form submission and file upload
        if ($this->request->is('post')) {


            // Validate and handle file upload
            $mediaFile = $this->request->getFile('media');



            echo "<br><br>";

            echo "<pre>";
            print_r($mediaFile);
            echo "<br><br>";
            print_r($mediaFile->getMimeType());
            echo "<br><br>";

            //for getting type of file (image/video
            $temp = $mediaFile->getMimeType();
            $temparray = explode("/", $temp);
            $type = $temparray[0];
            echo $type;

            echo "<br><br>";
            $data = [
                'user_id' => session()->get('id'),
                'caption' => $this->request->getPost('caption'),
                'type' => $type,
            ];




            if ($mediaFile->isValid() && !$mediaFile->hasMoved()) {
                $newName = $mediaFile->getRandomName();
                $mediaFile->move('uploads/' . $type, $newName);
                $data['media_url'] = $newName;
            }


            print_r($data);

            //for inserting data in database

            $model = new PostsModel();

            $model->save($data);



            return redirect()->to(base_url('uplift'))->with('status', 'Post Uploaded !');
        }
    }


    public function post(): string
    {
        return view('components/post');
    }

    public function search_users($searchTerm)
    {

        $userModel = new UsersModel();
        $habitModel = new HabitsModel();
        $i = 0; //taken for for each loop


        $sql = "SELECT user_id 
        FROM users 
        WHERE fname LIKE ? 
           OR lname LIKE ? 
           OR username LIKE ?";

        $query = $this->db->query($sql, array("%$searchTerm%", "%$searchTerm%", "%$searchTerm%"));
        $results = $query->getResultArray();

        // Output the user_ids of the resultant users
        // foreach ($results as $row) {
        //     echo $row['user_id'] . "<br>";
        // }

        $data['type'] = "searchResult";

        if (!empty($results)) {
            // for each user_id we have to fetch data of profile_info from user model
            foreach ($results as $row) {

                $data['profile_info'][$i] = $userModel->getUserInfo($row['user_id']);
                //    here as getUserInfo() function send only query output we have used indexing method to index each profile_info and store in $data array
                $i++; //increment of index
            }
            echo view("components/site_essentials/userBlock.php", $data);
        } else {
            echo '<p style="text-align:center;"> No Results </p>';
        }


        // print_r($results);
    }
}
