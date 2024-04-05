<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\PostsModel;

class UpliftController extends BaseController
{
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

            $rule = [
                'email' => 'required|valid_email',
                'user_password' => 'required|validate_user[email,password]'
            ];

            $errors = [
                'user_password' => [
                    'validate_user' => 'incorrect password or email'
                ]
            ];
        }
        if (!$this->validate($rule, $errors)) {
            $data['validation'] = $this->validator;

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
                    'min_length' => 'password is too short',
                    'max_length' => 'password is too long',
                ],
                'cpassword' => [
                    'required' => 'Confirmation of password is required',
                    'matches' => 'password should be matching'
                ],
                'fname' => [
                    'min_length' => 'first name is too short',
                    'max_length' => 'first name is too long',
                ],
                'lname' => [
                    'min_length' => 'last name is too short',
                    'max_length' => 'last name is too long',
                ],
                'username' => [
                    'is_unique' => 'this username already exists',
                ]
            ];

            if (!$this->validate($rule, $errors)) {
                $data['validation'] = $this->validator;

                return view('signup', $data);
            } else {

                //now if data is validated then we'll create data assosiative array where will store
                // column names of database will be same as assosiative array and value will be from post req

                $data = [
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('fname'),
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
    public function uplift(): string
    {
        return view('uplift');
    }

    public function post_form_old(): string
    {
        return view('post_form');
    }

    //for submiting posts


    public function submitPost()
    {
        $model = new UsersModel(); // Replace YourModel with the actual model you use

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
}
