<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\StoriesModel;
use App\Models\UsersModel;

class StoriesController extends BaseController
{
    public function index()
    {
        //..
    }
    public function latestStories()
    {
        $model = new StoriesModel();
        $data["latestStories"] = $model->getLatestStories();
        // echo "latest stories\n<pre>";
        // print_r($data);
        echo view('components/storiesContent', $data);
    }

    // this will give json of latest storeis by which we can create array 
    // and implement left and right click feature
    public function latestStoriesArray()
    {
        $model = new StoriesModel();
        $data["latestStories"] = $model->getLatestStoriesUserId();
        echo json_encode($data);
    }
    public function storyDialogBox()
    {
        echo view('components/storyDialog');
    }


    public function getStoriesOfUser($userId)
    {
        $userModel = new UsersModel();
        $model = new StoriesModel();

        $data["stories"] = $model->getStoriesOfUserFromDb($userId);
        $data["userInfo"] = $userModel->getUserInfo($userId);
        // print_r($data);
        echo json_encode($data);
        // echo view('components/storyDialog', $data);
    }

    public function story_form()
    {
        return view("story_form");
    }

    public function add_stories()
    {
        $model = new StoriesModel(); //object instanciation of Model

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
                'caption' => $this->request->getPost('caption'),
                'type' => $type,
            ];

            if ($mediaFile->isValid() && !$mediaFile->hasMoved()) {
                $newName = $mediaFile->getRandomName();
                $mediaFile->move('uploads/stories/' . $type, $newName);
                $data['media'] = $newName;
            }

            print_r($data);

            $model->save($data);
            // $data2["latestStories"] = $model->getLatestStories();
            // echo "latest stories\n<pre>";
            // print_r($data2);
        }
    }
}
