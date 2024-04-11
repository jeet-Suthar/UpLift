<?php

namespace App\Models;

use CodeIgniter\Model;

class PostSummaryModel extends Model
{
    protected $table            = 'post_summary';
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'media_url', 'caption', 'type', 'uploaded_time', 'total_likes', 'total_comments'];

    //! NOTE read following ->
    //* following function will get all from db ordered by date and with offset and limit range only
    //* for easy debug and updatation in future  
    public function getPosts($limit, $offset)
    {
        $userId = session()->get('id');

        $query = $this->query("SELECT * 
        FROM post_summary 
        where user_id = ? OR user_id IN (select friend_id
                                          FROM friends f
                                          WHERE f.user_id = ?)
        ORDER BY uploaded_time DESC 
        LIMIT ? 
        OFFSET ? ", [$userId, $userId, $limit, $offset]);

        return $query->getResultArray();
        // return $this->orderBy('uploaded_time', 'DESC')->findAll($limit, $offset);
    }
    public function countPost()
    {
        $userId = session()->get('id');

        $query = $this->query("SELECT COUNT(*) 
        FROM post_summary 
        where user_id = ? OR user_id IN (select friend_id
                                          FROM friends f
                                          WHERE f.user_id = ?)
                                          ", [$userId, $userId]);

        // Fetch the result row as an array
        $result = $query->getResultArray();
        return $result[0]['count'];

        // Extract the post count value from the array
        // $postCount = isset($result['post_count']) ? intval($result['post_count']) : 0;

        // return $postCount;
    }




    //     // Dates
    //     protected $useTimestamps = false;
    //     protected $dateFormat    = 'datetime';
    //     protected $createdField  = 'created_at';
    //     protected $updatedField  = 'updated_at';
    //     protected $deletedField  = 'deleted_at';

    //     // Validation
    //     protected $validationRules      = [];
    //     protected $validationMessages   = [];
    //     protected $skipValidation       = false;
    //     protected $cleanValidationRules = true;

    //     // Callbacks
    //     protected $allowCallbacks = true;
    //     protected $beforeInsert   = [];
    //     protected $afterInsert    = [];
    //     protected $beforeUpdate   = [];
    //     protected $afterUpdate    = [];
    //     protected $beforeFind     = [];
    //     protected $afterFind      = [];
    //     protected $beforeDelete   = [];
    //     protected $afterDelete    = [];
}
