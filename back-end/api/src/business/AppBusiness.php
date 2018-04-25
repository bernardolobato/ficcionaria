<?php 
namespace Business;
use Repository\ProfileRepository;
use Model\Profile;
use Repository\AppRepository;

class AppBusiness  {
    var $repository;

    public function __construct() {
        $this->repository = AppRepository::getInstance();
    }

    public function get(int $id) {
        $entity = $this->repository->find($id);
        return $entity;
    }

    public function add($entity) {

        AppRepository::saveNew($entity);
        $entity->id;
        return $entity;
    }

    public function save($entity) {
        $entity = AppRepository::update($entity);
        $entity->id;
        return $entity;
    }

    public function delete($entity) {
        AppRepository::delete($entity);
        return true;
    }

    public function search($params) {
        $entity = AppRepository::search($params);
        return $entity;
    }
}