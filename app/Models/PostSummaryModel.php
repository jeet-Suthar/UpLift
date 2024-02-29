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
        return $this->orderBy('uploaded_time', 'DESC')->findAll($limit, $offset);
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
