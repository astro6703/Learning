<?php

require_once "IContainer.php";
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

    private $guestBookMessagesProvider;

    private function __construct() {
        $this->guestBookMessagesProvider = new GuestBookMessagesProvider();
    }

    function resolve(string $service) {
        switch ($service) {
            case "IGuestBookMessagesProvider": return $this->guestBookMessagesProvider;
            default: http_response_code(ResponseCodes::$internalServerErrorStatusCode); die("Unknown service $service.");
        }
    }
}