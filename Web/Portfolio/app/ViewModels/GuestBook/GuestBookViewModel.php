<?php


class GuestBookViewModel {
    public array $guestBookEntries;
    public ValidationViewModel $validationViewModel;

    public function __construct(array $guestBookEntries, ValidationViewModel $validationViewModel) {
        $this->guestBookEntries = $guestBookEntries;
        $this->validationViewModel = $validationViewModel;
    }
}