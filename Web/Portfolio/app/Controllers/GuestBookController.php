<?php

include "Views/ViewRenderer.php";
include "ViewModels/GuestBook/GuestBookViewModel.php";
include "Validators/GuestBookRequestValidator.php";
include "Validators/GuestBookImportValidator.php";
include "ViewModels/Shared/ValidationViewModel.php";

class GuestBookController {
    private IContainer $container;
    private IGuestBookMessagesProvider $guestBookMessagesProvider;

    public function __construct(IContainer $container) {
        $this->container = $container;
        $this->guestBookMessagesProvider = $container->resolve("IGuestBookMessagesProvider");
    }

    public function index() {
        ViewRenderer::render("Views/GuestBook/Index.php", "Guest Book", $this->createViewModel(true));
    }

    public function visitPost() {
        $validator = new GuestBookRequestValidator($_POST);
        $validationResult = $validator->validate();

        if ($validationResult->isValid) {
            $entry = new GuestBookEntry($_POST["Name"],
                                        $_POST["Email"],
                                        $_POST["Message"],
                                        new DateTime());
            $this->guestBookMessagesProvider->saveEntry($entry);
        }

        $this->index();
    }

    public function import() {
        $viewModel = new ValidationViewModel(true, array());
        ViewRenderer::render("Views/GuestBook/Import.php", "Guest Book Import", $viewModel);
    }

    public function importPost() {
        $validator = new GuestBookImportValidator($_FILES, $this->container);
        $validationResult = $validator->validate();

        if (!$validationResult->isValid) {
            $viewModel = new ValidationViewModel($validationResult->isValid, $validationResult->errors);
            ViewRenderer::render("Views/GuestBook/Import.php", "Guest Book Import", $viewModel);
            return;
        }

        $this->guestBookMessagesProvider->importGuestBook($_FILES["GuestBook"]["tmp_name"]);
        $this->index();
    }

    private function createViewModel(bool $isValid, array $messages = array()) {
        $guestBookEntries = $this->guestBookMessagesProvider->getAllEntries();
        $validationViewModel = new ValidationViewModel($isValid, $messages);

        return new GuestBookViewModel($guestBookEntries, $validationViewModel);
    }
}