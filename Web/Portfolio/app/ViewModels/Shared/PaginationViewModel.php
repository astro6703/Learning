<?php


class PaginationViewModel {
    public $currentPage;
    public $totalPages;
    public $baseUrl;

    public function __construct($currentPage, $totalPages, $baseUrl) {
        $this->currentPage = $currentPage;
        $this->totalPages = $totalPages;
        $this->baseUrl = $baseUrl;
    }
}