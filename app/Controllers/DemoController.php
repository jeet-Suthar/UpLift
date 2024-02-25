<?php 
namespace App\Controllers;

use App\Models\UsersModel;


class DemoController extends BaseController
{
    public function index(): string
    {
        $data['names']=array("jitendra","suthar");
        return view('DemoView',$data);
    }
    public function login() : string

    {
        // $data['username'];

        return view('login');
    }
 

    //for new user registeration without validationi and authentication
    public function new() : string{
        $dbdata['user']= $this->request->getPost();
        $data= $this->request->getPost();
        

        $users = new UsersModel;
        
        
        if(!$users->save($data))
        {
            $dbdata['error']=$users->error();
        }
        return view('profile',$dbdata);
    }
   
}
?>