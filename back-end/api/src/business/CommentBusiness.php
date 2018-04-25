<?php 
namespace Business;
use Repository\CommentRepository;
use Model\Comment;
use Repository\AppRepository;

class CommentBusiness extends AppBusiness {

    public function __construct() {
        $this->repository = CommentRepository::getInstance();
    }

    public function search($params) {
        $entity = CommentRepository::search($params);
        return $entity;
    }
}