<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\PostSummaryModel;
use App\models\CommentsModel;


class PostController extends BaseController
{
    public function index()
    {
        echo "you have reeached index of post controller";
    }

    // method for getting total post in database at particular time
    public function totalPost(): string
    {
        $postModel = new PostSummaryModel();
        return $postModel->countAll();
    }

    public function get_post($page)
    {
        $postModel = new PostSummaryModel();
        $commentModel = new CommentsModel();

        $count = 10; //count of feed page 
        
        if($page != 'last') //for page 1,2,3 so on
        {
            //! this is for those page which are not at last 

            $offset = ($page - 1) * $count;
            $data['post_data'] = $postModel->getPosts($count,$offset);
            $data['comment_data'] = null;

            foreach($data['post_data'] as $post)
            {
                $index = array_search($post,$data['post_data']);
                $data['comment_data'][$index] = $commentModel->getTopCommentsWithUserInfo($post['post_id']);
            }

            echo view('components/post',$data);

            
        }
        else{ // for last page 

            //! for last page on site or (if total post are less then 10)

            //* now will get total post count from db
            $totalPost = $postModel->countAll();
            
            // if we modulous this count then will get remmaining posts
            $remainingPost = $totalPost % $count;
            
            //*  now remainingPost will be send in place of $count and in place of $offset
            //* we'll send difference of this two
            
            $data['post_data'] = $postModel->getPosts($remainingPost,($totalPost - $remainingPost));
            
            foreach($data['post_data'] as $post)
            {
                $index = array_search($post,$data['post_data']);
                $data['comment_data'][$index] = $commentModel->getTopCommentsWithUserInfo($post['post_id']);
            }
            echo view('components/post',$data);
            // print_r($data);



        }
        //for array response
        // echo "<pre>";
        // print_r($data);

        // for JSON type response
        // echo "<pre>";
        // echo json_encode(['data' => $data]);
    }
}
