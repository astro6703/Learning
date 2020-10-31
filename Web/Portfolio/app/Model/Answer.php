<?php

require_once "BaseActiveRecord.php";

class Answer extends BaseActiveRecord {
    public static $tablename = "answers";
    public static $className = "Answer";
    public static $dbfields = array("postedAt", "question1Answer", "question2Answer", "fullTextAnswer", "studentFullName", "email");

    public string $postedAt;
    public int $question1Answer;
    public int $question2Answer;
    public string $fullTextAnswer;
    public string $studentFullName;
    public string $email;

    public function __construct() {
        parent::__construct();
    }
}