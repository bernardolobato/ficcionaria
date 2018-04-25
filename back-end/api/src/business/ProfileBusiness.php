<?php 
namespace Business;
use Repository\ProfileRepository;
use Model\Profile;
use Repository\AppRepository;

class ProfileBusiness extends AppBusiness {

    public function __construct() {
        $this->repository = ProfileRepository::getInstance();
    }

    public function search($params) {
        $entity = ProfileRepository::search($params);
        return $entity;
    }
}