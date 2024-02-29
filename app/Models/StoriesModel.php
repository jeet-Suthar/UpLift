<?php

namespace App\Models;

use App\Models\LatestStoriesModel;

use CodeIgniter\Model;

class StoriesModel extends Model
{
    protected $table            = 'stories';
    protected $primaryKey       = 'stoies_id';
    protected $allowedFields    = ['user_id', 'media', 'caption', 'total_story_likes', 'total_story_views', 'uploaded_time', 'type'];

    //gets all the latest storeis for a user(mean it will get only latest stories 
    //img_url, user_id,username, pfp etc...so that we can represent stories on main page)
    public function getLatestStories()
    {
        $LatestStories = new LatestStoriesModel();
        return $LatestStories->findAll();
    }

    //after getting above data when user clicks on certain stories then 
    // request user that user_id will go to backend then data of that user's story will be sent 

    //gets latest stories of users based on user_id which are uploaded 24 hours ago only...
    public function getStoriesOfUserFromDb($user_id)
    {
        $query = $this->where('user_id', $user_id)
            ->where('uploaded_time >=', date('Y-m-d H:i:s', strtotime('-24 hours')))
            ->orderBy('uploaded_time', 'desc')
            ->get();

        // Fetch the result
        return $query->getResult();
    }
    public function getLatestStoriesUserId()
    {
        $LatestStories = new LatestStoriesModel();
        $query = $LatestStories->select('user_id')->get();
        return $query->getResult();
    }
}
