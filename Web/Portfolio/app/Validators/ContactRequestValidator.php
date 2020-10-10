<?php

require_once "BaseRequestValidator.php";
require_once "ValidationResult.php";

class ContactRequestValidator extends BaseRequestValidator {
    public function __construct($post) {
        parent::__construct($post);
    }

    public function validate() {
        $v = new Valitron\Validator($this->post);
        $v->rule('required', ['Name', 'Email', 'Phone', 'Message', 'Date']);
        $v->rule('regex', 'Name', '/[A-Za-z]+ [A-Za-z]+ [A-Za-z]+/');
        $v->rule('email', 'Email');
        $v->rule('regex', 'Phone', '/^[+][7|3]\d{9,11}$/');
        $v->rule('dateFormat', 'Date', 'd.m.Y');

        $isValid = $v->validate();
        $errors = $v->errors();

        return new ValidationResult($isValid, $errors);
    }
}