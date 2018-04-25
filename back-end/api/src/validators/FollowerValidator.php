<?php
namespace Validator;

use Exception\AppException;



class FollowerValidator
{

    public static function addValidator($entity)
    {
        $errors = [];
        if (!$entity->follower || $entity->follower->id === null) {
            $errors['follower'][] = "Seguidor é obrigatório";
        }
        if (!$entity->followed || $entity->followed->id === null) {
            $errors['followed'][] = "Seguido é obrigatório";
        }
        if (count($errors) > 0) {
            throw new AppException($errors);
        }
    }

    public static function isValidId ($id) {
        $errors = [];
        if (!$id) {
            $errors['id'][] = "id é obrigatório";
        }
        if (!ctype_digit($id)) {
            $errors['id'][] = "O formato do id é inválido";
        }

        if (count($errors) > 0) {
            throw new AppException($errors);
        }
    }

    public static function validParametersSearchList($args) {
        
    }

    public static function deletePostValidator ($post) {

    }
}