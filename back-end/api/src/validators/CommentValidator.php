<?php
namespace Validator;

use Exception\AppException;



class CommentValidator
{

    public static function addValidator($entity)
    {
        $errors = [];
        if ($entity->text === null) {
            $errors['text'][] = "Texto é obrigatório";
        }
        if ($entity->status === null) {
            $errors['status'][] = "Status é obrigatório";
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
            $errors['id'][] = "O formado do id é inválido";
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