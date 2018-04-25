<?php 
namespace Business;

use Repository\PostRepository;
use Model\Post;

class PostBusiness extends AppBusiness {

    public function __construct()
    {
        $this->repository = PostRepository::getInstance();
    }

    public function search($params)
    {
        $entity = PostRepository::search($params);
        return $entity;
    }
}