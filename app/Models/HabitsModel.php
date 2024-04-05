<?php

namespace App\Models;

use CodeIgniter\Model;

class HabitsModel extends Model
{
    protected $table            = 'habits';
    protected $primaryKey       = 'habit_id';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
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

    //*-----verification task database backend-------------

    public function verificationTaskOf($userId)
    {

        //simply find those friends of user who are not in verifier list

        $query = $this->query("SELECT DISTINCT applicant_id
                                FROM verification_tasks
                                WHERE verifier_id = ?
                                 AND sent_time >= CURRENT_DATE - INTERVAL '1 day'
                                AND task_status = false;", [$userId]);

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }

    public function verification_task_sent_of_user($userId, $applicantId)
    {

        //simply find those friends of user who are not in verifier list

        $query = $this->query("SELECT hs.media, hs.habit_id, h.title, hs.type, hs.sent_time
        FROM habit_sent hs
        LEFT JOIN habits h ON hs.habit_id = h.habit_id
        WHERE hs.sent_time IN (
            SELECT sent_time
            FROM verification_tasks
            WHERE verifier_id = ? 
            AND applicant_id = ?
            AND task_status = false
        );", [$userId, $applicantId]);

        return $query->getResultArray(); //notice here we use getResultArray() function to get result in form of array
    }

    // inserting row in habit_verification table
    public function addInHabitVerification($userId, $habitId, $sentTime, $status)
    {
        $query = $this->query('INSERT INTO habit_verification(
            habit_id, user_id, status, sent_time)
           VALUES (?, ?, ?, ?);', [$habitId, $userId, $status, $sentTime]); // Replace $user_id with the user ID you want to find friend of

    }

    public function updateStatus($sentTime)
    {

        $query = $this->query('UPDATE verification_tasks
        SET task_status = true
        WHERE sent_time = ?;', [$sentTime]); // Replace $user_id with the user ID you want to find friend of


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
