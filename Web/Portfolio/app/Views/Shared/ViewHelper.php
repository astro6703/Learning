<?php

require_once "ViewModels/Shared/PaginationViewModel.php";

class ViewHelper {
    public static function normalizeErrors($errors) {
        $result = array();
        foreach ($errors as $key => $value) {
            foreach ($value as $nestedValue) {
                array_push($result, $nestedValue);
            }
        }

        return $result;
    }

    public static function writeValidationErrorsList($errors) {
        echo("<ul>");
        foreach (ViewHelper::normalizeErrors($errors) as $error) {
            echo("<li>$error</li>");
        }
        echo("</ul>");
    }

    private static function renderLinkToPage($pageNumber, $baseUrl, $isActive, $isPresent, $title = null) {
        if (!$isPresent) {
            return;
        }
        $innerTitle = is_null($title)
            ? $pageNumber
            : $title;
        $url = $baseUrl . "?page=" . $pageNumber;
        if ($isActive) {
            echo "<a href='$url'>$innerTitle</a>";
        } else {
            echo "<span>$innerTitle</span>";
        }
    }

    private static function renderLinkToCurrentPage(PaginationViewModel $model) {
        static::renderLinkToPage($model->currentPage, $model->baseUrl, false, true);
    }

    private static function renderLinkToPreviousPage(PaginationViewModel $model) {
        static::renderLinkToPage($model->currentPage - 1,
                                 $model->baseUrl,
                                 $model->currentPage != 1,
                                 true,
                                 "Previous");
    }

    private static function renderLinkToNextPage(PaginationViewModel $model) {
        static::renderLinkToPage($model->currentPage + 1,
                                 $model->baseUrl,
                                 $model->currentPage < $model->totalPages,
                                 true,
                                 "Next");
    }

    public static function renderPagination(PaginationViewModel $model) {
        static::renderLinkToPreviousPage($model);
        static::renderLinkToPage($model->currentPage - 2,
                                 $model->baseUrl,
                                 $model->currentPage >= 3,
                                 $model->currentPage >= 3);
        static::renderLinkToPage($model->currentPage - 1,
                                 $model->baseUrl,
                                 $model->currentPage >= 2,
                                 $model->currentPage >= 2);
        static::renderLinkToCurrentPage($model);
        static::renderLinkToPage($model->currentPage + 1,
                                 $model->baseUrl,
                                 $model->currentPage + 1 <= $model->totalPages,
                                 $model->currentPage + 1 <= $model->totalPages);
        static::renderLinkToPage($model->currentPage + 2,
                                 $model->baseUrl,
                                 $model->currentPage + 2 <= $model->totalPages,
                                 $model->currentPage + 2 <= $model->totalPages);
        static::renderLinkToNextPage($model);
    }
}