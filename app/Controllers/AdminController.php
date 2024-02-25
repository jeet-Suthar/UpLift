<?php 
namespace App\Controllers;
// namespace App\Views\admin;

use App\Models\UsersModel;


class AdminController extends BaseController
{
    public function index(): string
    {
        
        return "welcome to admin panel";
    }

    public function users() : string {

        //create object of UserModels class 
        $users = new UsersModel;

        $data['users'] = $users->findAll(); 
        //will give all enteries of users table
       
        return view('admin\users',$data);
    }
}
?>