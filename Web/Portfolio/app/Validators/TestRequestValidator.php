<?php

include "BaseRequestValidator.php";
include "ValidationResult.php";

class TestRequestValidator extends BaseRequestValidator {
    public function __construct($post) {
        parent::__construct($post);
    }

    public function validate() {
        $v = new Valitron\Validator($this->post);
        $v->rule('required', ['Question1', 'Question2', 'Question3', 'Name', 'Email' ]);
        $v->rule('integer', 'Question1')->rule('in', 'Question1', [ 1, 2 ]);
        $v->rule('integer', 'Question2')->rule('in', 'Question2', [ 1, 2, 3 ]);
        $v->rule('regex', 'Name', '/[A-Za-z]+ [A-Za-z]+ [A-Za-z]+/');
        $v->rule('email', 'Email');

        $isValid = $v->validate();
        $errors = $v->errors();

        return new ValidationResult($isValid, $errors);
    }
}