<?php 
namespace Business;
use Repository\FollowerRepository;
use Model\Follower;
use Repository\AppRepository;

class FollowerBusiness extends AppBusiness {

    public function __construct() {
        $this->repository = FollowerRepository::getInstance();
    }

    public function search($params) {
        $entity = FollowerRepository::search($params);
        return $entity;
    }
}