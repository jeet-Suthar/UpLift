<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
