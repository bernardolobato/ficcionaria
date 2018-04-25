<?php
namespace Validator;

use Exception\AppException;



class ProfileValidator
{

    public static function addValidator($profile)
    {
        $errors = [];
        if ($profile->name === null) {
            $errors['name'][] = "Nome é obrigatório";
        }
        if ($profile->bio === null) {
            $errors['bio'][] = "Bio é obrigatório";
        }

        if ($profile->tags === null) {
            $errors['tags'][] = "Pelo menos uma tag é obrigatória";
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