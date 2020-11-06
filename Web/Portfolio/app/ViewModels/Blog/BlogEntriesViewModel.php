<?php


class BlogEntriesViewModel {
    public array $blogEntries;
    public PaginationViewModel $paginationViewModel;

    public function __construct(array $blogEntries, PaginationViewModel $paginationViewModel) {
        $this->blogEntries = $blogEntries;
        $this->paginationViewModel = $paginationViewModel;
    }
}