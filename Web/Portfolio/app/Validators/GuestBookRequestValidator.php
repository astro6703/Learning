<?php

include "BaseRequestValidator.php";
include "ValidationResult.php";

class GuestBookRequestValidator extends BaseRequestValidator {
    public function __construct($post) {
        parent::__construct($post);
    }

    public function validate() {
        $v = new Valitron\Validator($this->post);
        $v->rule('required', ['Name', 'Email', 'Message']);
        $v->rule('regex', 'Name', '/[A-Za-z]+ [A-Za-z]+ [A-Za-z]+/');
        $v->rule('email', 'Email');

        $isValid = $v->validate();
        $errors = $v->errors();

        return new ValidationResult($isValid, $errors);
    }
}