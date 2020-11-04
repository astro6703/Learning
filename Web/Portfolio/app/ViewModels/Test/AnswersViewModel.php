<?php

require_once "ViewModels/Shared/PaginationViewModel.php";

class AnswersViewModel {
    public array $answers;
    public PaginationViewModel $paginationViewModel;

    public function __construct(array $answers, PaginationViewModel $paginationViewModel) {
        $this->answers = $answers;
        $this->paginationViewModel = $paginationViewModel;
    }
}