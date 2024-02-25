<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table            = 'comments';
    // protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['user_id','post_id','content','total_comment_likes','commented_time'];

    //getting top comments
    public function getTopCommentsWithUserInfo($postId,$count=2)
    {
        $builder = $this->db->table('comments');
        $builder->select('comments.comment_id, comments.content, comments.total_comment_likes, users.username, users.profile_dp');
        $builder->join('users', 'comments.user_id = users.user_id');
        $builder->where('comments.post_id', $postId);
        $builder->orderBy('comments.total_comment_likes', 'DESC');
        $builder->limit($count);

        return $builder->get()->getResultArray();
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
