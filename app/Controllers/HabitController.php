<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HabitsModel;
use App\Models\UserHabitPercentageModel;
use App\Models\RewardsModel;
use App\Models\UserRewardViewModel;

class HabitController extends BaseController
{
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
}
