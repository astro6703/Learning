<?php

require_once "BaseRequestValidator.php";
require_once "ValidationResult.php";

class GuestBookImportValidator {
    private array $files;
    private IGuestBookMessagesProvider $guestBookMessageProvider;
    private int $fileSizeLimit = 4194304;

    public function __construct($files, $container) {
        if (empty($files)) {
            http_response_code(ResponseCodes::$badRequestStatusCode);
            die();
        }
        $this->files = $files;
        $this->guestBookMessageProvider = $container->resolve("IGuestBookMessagesProvider");
    }

    public function validate() {
        $fileName = $_FILES["GuestBook"]["tmp_name"];
        $fileSize = $_FILES["GuestBook"]["size"];
        $fileContent = file_get_contents($fileName);

        $isFileNameProvided = !empty($fileName);
        $isSizeWithinLimit = $fileSize <= $this->fileSizeLimit;
        $isFileContentValid = $this->guestBookMessageProvider->verifyGuestBookContents($fileContent);
        $isFileValid = $isFileNameProvided && $isSizeWithinLimit && $isFileContentValid;

        return new ValidationResult($isFileValid, $isFileValid ? array() : array(array(1 => "File content is not valid.")));
    }
}