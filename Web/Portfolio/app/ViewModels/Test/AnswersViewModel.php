<?php


class AnswersViewModel {
    public array $answers;

    public function __construct($answers) {
        $this->answers = $answers;
    }
}