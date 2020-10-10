<?php

require_once "Views/ViewRenderer.php";
require_once "Validators/ContactRequestValidator.php";
require_once "ViewModels/Shared/ValidationViewModel.php";

class ContactController
{
    public function __construct(IContainer $container) {}

    public function index() {
        $viewModel = new ValidationViewModel(true, array());
        ViewRenderer::render("Views/Contact/Index.php", "Contact me", $viewModel);
    }

    public function contactPost() {
        $validator = new ContactRequestValidator($_POST);
        $validationResult = $validator->validate();

        if ($validationResult->isValid) {
            ViewRenderer::render("Views/Contact/Success.php", "Contact me");
            return;
        }

        $viewModel = new ValidationViewModel($validationResult->isValid, $validationResult->errors);
        ViewRenderer::render("Views/Contact/Index.php", "Contact me", $viewModel);
    }
}