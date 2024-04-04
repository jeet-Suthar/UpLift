<?php

namespace App\Models;

use CodeIgniter\Model;

class HabitsModel extends Model
{
    protected $table            = 'habits';
    protected $primaryKey       = 'habit_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['habit_id', 'user_id', 'title', 'description', 'start_date'];


    public function getVerifiersrOf($userId)
    {
        $query = $this->query('SELECT verifier_id 
                                FROM habit_verifier 
                                WHERE user_id=?;', [$userId]); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here  we use getResultArray() function to get result in form of array
    }
    public function newVerifier($userId)
    {

        //simply find those friends of user who are not in verifier list

        $query = $this->query('SELECT friend_id 
                                FROM friends 
                                WHERE user_id= ? AND friend_id IN (SELECt user_id 
                                                                    FROM friends
                                                                    WHERE friend_id = ?)
                                                AND friend_id NOT IN (SELECT verifier_id
                                                                    FROM habit_verifier
                                                                    WHERE user_id = ?);', [$userId, $userId, $userId]);

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
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
