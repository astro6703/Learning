<?php

require_once "BaseActiveRecord.php";

class BlogEntry extends BaseActiveRecord {
    public static $tablename = "blog";
    public static $className = "BlogEntry";
    public static $dbfields = array("createdAt", "subject", "message", "photoName", "name");

    public function __construct() {
        parent::__construct();
    }

    public string $createdAt;
    public string $subject;
    public string $message;
    public string $photoName;
    public string $name;
}