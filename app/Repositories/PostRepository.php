<?php
namespace App\Repositories;

use App\Repositories\PostRepositoryInterface;

use App\Post;
use Config;

// class PostRepository
// {
//         protected $post;
//
//         public function __construct(Post $post)
//         {
//                 $this->post = $post;
//         }
//
//         public function find($id)
//         {
//                 return $this->post->find($id);
//         }
//
//         public function findBy($att, $column)
//         {
//                 return $this->post->where($att, $column)->first();
//         }
// }

class PostRepository implements PostRepositoryInterface
{
        protected $post;

        public function __construct(Post $post)
        {
                $this->post = $post;
        }

        public function find($id)
        {
            return $this->post->find($id);
        }

        public function findBy($att, $column)
        {
            return $this->post->where($att, $column)->first();
        }

        public function paginate($perPage = 0, $columns = array('*'))
        {
            $perPage = $perPage ?: Config::get('repository::pagination.limit');
            return $this->post->paginate($perPage, $columns);
        }

        public function all($columns = array('*'))
        {
            return $this->post->rankedAll($columns);
        }

}
