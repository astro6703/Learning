<?php


interface IGuestBookMessagesProvider {
    public function saveEntry(GuestBookEntry $entry);

    public function getAllEntries();
}