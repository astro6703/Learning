<?php

require_once "IContainer.php";
require_once "Model/Repositories/PhotosRepository.php";
require_once "Model/GuestBookMessagesProvider.php";

class Container implements IContainer
{
    private static $instance;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Container();
        }
        return self::$instance;
    }

    private $photosRepository;
    private $guestBookMessagesProvider;

    private function __construct() {
        $this->photosRepository = new PhotosRepository();
        $this->guestBookMessagesProvider = new GuestBookMessagesProvider();
    }

    function resolve(string $service) {
        switch ($service) {
            case "IPhotosRepository": return $this->photosRepository;
            case "IGuestBookMessagesProvider": return $this->guestBookMessagesProvider;
            default: http_response_code(ResponseCodes::$internalServerErrorStatusCode); die("Unknown service $service.");
        }
    }
}