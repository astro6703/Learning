<?php

require_once "Views/ViewRenderer.php";
require_once "Validators/TestRequestValidator.php";
require_once "Validators/TestRequestVerification.php";
require_once "ViewModels/Shared/ValidationViewModel.php";
require_once "ViewModels/Test/SuccessfulTestViewModel.php";
require_once "ViewModels/Test/AnswersViewModel.php";
require_once "Model/Answer.php";

class TestController {
    public function __construct(IContainer $container) { }

    public function index() {
        $viewModel = new ValidationViewModel(true, array());
        ViewRenderer::render("Views/Test/Index.php", "Test", $viewModel);
    }

    public function answers() {
        $answers = Answer::findAll();
        $viewModel = new AnswersViewModel($answers);
        ViewRenderer::render("Views/Test/Answers.php", "Answers", $viewModel);
    }

    public function testPost() {
        $validator = new TestRequestValidator($_POST);
        $validationResult = $validator->validate();

        if ($validationResult->isValid) {
            $answer = new Answer();
            $answer->postedAt = date("Y-m-d H:i:s");
            $answer->studentFullName = $_POST["Name"];
            $answer->email = $_POST["Email"];
            $answer->question1Answer = $_POST["Question1"];
            $answer->question2Answer = $_POST["Question2"];
            $answer->fullTextAnswer = $_POST["Question3"];
            $answer->save();

            $testVerification = new TestRequestVerification($_POST);
            $viewModel = new SuccessfulTestViewModel($testVerification->verify());
            ViewRenderer::render("Views/Test/Success.php", "Test", $viewModel);
            return;
        }

        $viewModel = new ValidationViewModel($validationResult->isValid, $validationResult->errors);
        ViewRenderer::render("Views/Test/Index.php", "Test", $viewModel);
    }
}