<?php

include "BaseRequestValidator.php";
include "ValidationResult.php";

class GuestBookImportValidator extends BaseRequestValidator {
    public function __construct($post) {
        parent::__construct($post);
    }

    public function validate() {
        $v = new Valitron\Validator($this->post);
        $v->rule('required', ['GuestBook']);

        $isValid = $v->validate();
        $errors = $v->errors();

        return new ValidationResult($isValid, $errors);
    }
}