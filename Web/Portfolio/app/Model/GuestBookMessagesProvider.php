<?php

include "GuestBookEntry.php";
include "Model/IGuestBookMessagesProvider.php";

class GuestBookMessagesProvider implements IGuestBookMessagesProvider {
    private string $fileName;

    public function __construct() {
        $this->fileName = $_SERVER["DOCUMENT_ROOT"] . "/GuestBookEntries.inc";
    }

    public function saveEntry(GuestBookEntry $entry) {
        $handle = fopen($this->fileName, "a") or die("Cannot open file $this->fileName");
        fwrite($handle, $this->stringifyGuestBookEntry($entry));
        fclose($handle);
    }

    public function getAllEntries() {
        if (!file_exists($this->fileName)) {
            $handle = fopen($this->fileName, 'w');
            fclose($handle);
        }
        $fileContent = file_get_contents($this->fileName);
        $stringifiedEntries = preg_split("/;/", $fileContent, null, PREG_SPLIT_NO_EMPTY);

        return array_map([$this, "parseGuestBookEntry"], $stringifiedEntries);
    }

    private function stringifyGuestBookEntry(GuestBookEntry $entry) {
        $normalizedName = $this->stripCommasAndSemicolons($entry->name);
        $normalizedEmail = $this->stripCommasAndSemicolons($entry->email);
        $normalizedMessage = $this->stripCommasAndSemicolons($entry->message);
        $formattedDate = $entry->date->format("d.m.Y");

        return "$normalizedName,$normalizedEmail,$normalizedMessage,$formattedDate;";
    }

    private function stripCommasAndSemicolons($line) {
        return str_replace([",", ";"], [" ¯\_(ツ)_/¯ "], $line);
    }

    private function parseGuestBookEntry(string $stringifiedEntry): GuestBookEntry {
        $entryProperties = explode(",", $stringifiedEntry);

        return new GuestBookEntry($entryProperties[0], $entryProperties[1], $entryProperties[2], DateTime::createFromFormat("d.m.Y", $entryProperties[3]));
    }

    public function importGuestBook() {
        // TODO: Implement importGuestBook() method.
    }

    public function verifyGuestBookContents(string $contents) {
        return preg_match("/[A-Za-z]+ [A-Za-z]+ [A-Za-z]+,/", $contents);
    }
}