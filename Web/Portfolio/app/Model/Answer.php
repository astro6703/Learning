<?php

require_once "BaseActiveRecord.php";

class Answer extends BaseActiveRecord {
    public static $tablename = "answers";
    public static $className = "Answer";
    public static $dbfields = array("createdAt", "question1Answer", "question2Answer", "fullTextAnswer", "studentFullName", "email");

    public string $createdAt;
    public int $question1Answer;
    public int $question2Answer;
    public string $fullTextAnswer;
    public string $studentFullName;
    public string $email;

    public function __construct() {
        parent::__construct();
    }
}