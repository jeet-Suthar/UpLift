<?php

namespace App\Models;

use CodeIgniter\Model;

class AokModel extends Model
{
    protected $table            = 'aok';
    protected $primaryKey       = 'act_id';

    protected $allowedFields    = ['act_id', 'user_id', 'context', 'media', 'total_gratitude', 'uploaded_time'];

    public function get_aok_data()
    {
        $query = $this->query('SELECT
        a.*,
          u.anonymous_profile_dp,
          u.anonymous_username
      FROM
          aok a
      JOIN
          users u ON a.user_id = u.user_id;'); // Replace $user_id with the user ID you want to find friend of

        return $query->getResultArray(); //notice here  we use getResultArray() function to get result in form of array
    }
}
