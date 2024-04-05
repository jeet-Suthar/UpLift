<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatsModel extends Model
{
    protected $table            = 'chat_id';

    protected $allowedFields    = ['chat_id', 'sender_id', 'receiver_id', 'chat', 'chat_time'];


    public function getChatsOf($userId, $senderId)
    {
        $query = $this->query("SELECT 
        chat,
        CASE 
        WHEN chat_time > current_timestamp - interval '1 day' THEN to_char(chat_time, 'HH24:MI') 
        ELSE to_char(chat_time, 'DD Mon YYYY') 
    END AS formatted_chat_time,
        CASE 
            WHEN sender_id = ? THEN 'sent' 
            ELSE 'received' 
        END AS message_type
    FROM 
        chats
    WHERE 
        (sender_id = ? AND receiver_id = ?) 
        OR (sender_id = ? AND receiver_id = ?)
    ORDER BY 
        chat_time;
    ", [$userId, $userId, $senderId, $senderId, $userId]);

        return $query->getResultArray();
    }


    public function send_message($senderId, $receiverId, $message)
    {

        $query = $this->query('INSERT INTO chats(
            sender_id, receiver_id, chat)
           VALUES (?, ?, ?);', [$senderId, $receiverId, $message]); // Replace $user_id with the user ID you want to find friend of

    }
}
