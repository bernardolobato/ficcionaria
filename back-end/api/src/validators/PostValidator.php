<?php
namespace Validator;

use Exception\AppException;



class PostValidator
{

    public static function addPostValidator($post)
    {
        $errors = [];
        if ($post->title === null) {
            $errors['title'][] = "Título é obrigatório";
        }
        if ($post->text === null) {
            $errors['title'][] = "Texto é obrigatório";
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