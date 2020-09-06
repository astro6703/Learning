<?php

include "Views/ViewRenderer.php";
include "ViewModels/GuestBook/GuestBookViewModel.php";
include "Validators/GuestBookRequestValidator.php";
include "ViewModels/Shared/ValidationViewModel.php";

class GuestBookController {
    private IGuestBookMessagesProvider $guestBookMessagesProvider;

    public function __construct(IContainer $container) {
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

        ViewRenderer::render("Views/GuestBook/Index.php",
                             "Guest Book",
                             $this->createViewModel($validationResult->isValid, $validationResult->errors));
    }

    private function createViewModel(bool $isValid, array $messages = array()) {
        $guestBookEntries = $this->guestBookMessagesProvider->getAllEntries();
        $validationViewModel = new ValidationViewModel($isValid, $messages);

        return new GuestBookViewModel($guestBookEntries, $validationViewModel);
    }
}