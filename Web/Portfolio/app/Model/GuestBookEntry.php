<?php


class GuestBookEntry {
    public string $name;
    public string $email;
    public string $message;
    public DateTime $date;

    public function __construct(string $name, string $email, string $message, DateTime $date) {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->date = $date;
    }
}