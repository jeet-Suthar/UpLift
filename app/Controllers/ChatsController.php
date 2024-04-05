<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\ChatsModel;

class ChatsController extends BaseController
{
    public function index()
    {
        //
    }
    public function chat()
    {
        echo view('components/chats/chat');
    }
    public function chat_box()
    {
        echo view('components/chats/chatBox');
    }

    public function get_chats_of($senderId)
    {
        $chatsModel = new ChatsModel();
        $userModel = new UsersModel();

        $userId = session()->get('id');
        $i = 0; //taken for for each loop

        $data['chats'] = $chatsModel->getChatsOf($userId, $senderId);
        // users array will have sub array as friend_id becuase in database query we are selecting friend_id 

        $data['profile_info'] = $userModel->getUserInfo($senderId);

        // echo "<pre>";
        // print_r($data);
        echo view("components/chats/chatBox.php", $data);
    }
    public function send_message()
    {
        $message = $this->request->getPost('message');
        $receiverId = $this->request->getPost('receiver_id');

        $chatsModel = new ChatsModel();

        $senderId = session()->get('id');
        $chatsModel->send_message($senderId, $receiverId, $message);;



        // Process the message, for example, store it in the database
        // You can use $message variable here to access the message sent from the frontend

        // Return a response if needed
        return $this->response->setJSON(['status' => 'success']);
    }
}
