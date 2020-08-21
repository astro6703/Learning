<?php

include "Valitron/Validator.php";
include "ValidationResult.php";

class ContactRequestValidator {
    private array $post;

    public function __construct($post) {
        if (empty($post)) {
            throw new InvalidArgumentException('$post');
        }
        $this->post = $post;
    }

    public function validate() {
        $v = new Validator($this->post);
        $v->rule('required', ['Name', 'Email', 'Phone', 'Message', 'Date']);
        $v->rule('regex', 'Name', '/[A-Za-z]+ [A-Za-z]+ [A-Za-z]+/');
        $v->rule('email', 'Email');
        $v->rule('regex', 'Phone', '/^[+][7|3]\d{9,11}$/    ');
        $v->rule('dateFormat', 'Date', 'd.m.Y');

        $isValid = $v->validate();
        $errors = $v->errors();

        return new ValidationResult($isValid, $errors);
    }
}