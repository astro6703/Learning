<?php

require_once "BaseRequestValidator.php";
require_once "ValidationResult.php";

class BlogRequestValidator extends BaseRequestValidator {
    protected array $post;
    protected array $files;
    private  int $fileSizeLimit = 4194304;

    public function __construct($post, $files) {
        parent::__construct($post);
        if (empty($files)) {
            http_response_code(ResponseCodes::$badRequestStatusCode);
            die();
        }
        $this->files = $files;
    }

    public function validate() {
        $v = new Valitron\Validator($this->post);
        $v->rule('required', ['Name', 'Subject', 'Message']);
        $v->rule('regex', 'Name', '/[A-Za-z]+ [A-Za-z]+ [A-Za-z]+/');

        $photoFileName = $_FILES["Picture"]["tmp_name"];
        $photoSize = $_FILES["Picture"]["size"];

        $isFileNameProvided = !empty($photoFileName);
        $isSizeWithinLimit = $photoSize <= $this->fileSizeLimit;
        $isImage = exif_imagetype($photoFileName);

        $isValid = $v->validate() && $isFileNameProvided && $isSizeWithinLimit && $isImage;
        $errors = $v->errors();

        return new ValidationResult($isValid, $errors);
    }
}