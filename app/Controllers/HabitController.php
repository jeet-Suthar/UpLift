<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HabitController extends BaseController
{
    public function index()
    {
        //
    }

    public function habit()
    {
        echo view('components/habits/habit');
    }
}
