<?php
namespace Exception;

class AppException extends \Exception {
    public $errors;
    public function __construct($errors) {
        $this->errors = $errors;
    }
}