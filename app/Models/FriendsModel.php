<?php

namespace App\Models;

use CodeIgniter\Model;

class FriendsModel extends Model
{
    protected $table            = 'friends';

    protected $allowedFields    = ['user_id', 'friend_id'];

    // * it will find friend of user in the seesion
    public function find_friends_of_owner($userId)
    {
        $query = $this->query('SELECT friend_id 
                                FROM friends 
                                WHERE user_id= ? AND friend_id IN (SELECT user_id 
                                                                    FROM friends 
                                                                    WHERE friend_id = ?);', [$userId, $userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }
    // * it will find friend of $userId  which is requested
    public function findFriends($userId)
    {
        $query = $this->query('SELECT friend_id 
                                FROM friends 
                                WHERE user_id= ? AND friend_id IN (SELECT user_id 
                                                                    FROM friends 
                                                                    WHERE friend_id = ?);', [$userId, $userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }

    //* finds all requests that $uesrId person is bombaraded with
    public function findFriendRequestOf($userId)
    {
        $query = $this->query('SELECT user_id
                                FROM friends
                                WHERE friend_id = ? AND user_id NOT IN(SELECT friend_id 
                                                                        FROM friends
                                                                        WHERE user_id = ?);', [$userId, $userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }

    //! finds who are those mf who haven't accept request of innocnet $userId person

    public function findRequestNotAcceptedOf($userId)
    {
        $query = $this->query('SELECT friend_id 
                                FROM friends 
                                WHERE user_id=? AND friend_id NOT IN (select user_id 
									                                    FROM friends
									                                    WHERE friend_id = ?);', [$userId, $userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }
    public function findFollowersOfUser($userId)
    {
        $query = $this->query('SELECT user_id 
                                FROM friends 
                                WHERE friend_id=?;', [$userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }
    public function findFollowingsOfUser($userId)
    {
        $query = $this->query('SELECT friend_id 
                                FROM friends 
                                WHERE user_id=?;', [$userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }

    public function followerCount($userId)
    {
        $query = $this->query('SELECT COUNT(user_id)
                                FROM friends 
                                WHERE friend_id=?;', [$userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }
    public function followingCount($userId)
    {
        $query = $this->query('SELECT COUNT(friend_id) 
                                FROM friends 
                                WHERE user_id=?;', [$userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }

    public function followUser($userId)
    {
        $ownerId = session()->get('id');

        $query = $this->query('INSERT INTO friends(
            user_id,friend_id)
           VALUES (?, ?);', [$ownerId, $userId]); // Replace $user_id with the user ID you want to find friend of

    }
    public function unFollowUser($userId)
    {
        $ownerId = session()->get('id');

        $query = $this->query('DELETE FROM friends
            WHERE user_id = ? AND friend_id = ?
           ', [$ownerId, $userId]); // Replace $user_id with the user ID you want to find friend of

    }




    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}
