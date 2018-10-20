<?php
namespace App\Repositories;

interface PostRepositoryInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all($columns = array('*'));

    public function paginate($perPage = 15, $columns = array('*'));

}
