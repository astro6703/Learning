<?php


interface IGuestBookMessagesProvider {
    public function saveEntry(GuestBookEntry $entry);

    public function getAllEntries();

    public function importGuestBook($tempFileName);

    public function verifyGuestBookContents(string $contents);
}