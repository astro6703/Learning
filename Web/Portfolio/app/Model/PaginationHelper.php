<?php


class PaginationHelper {
    static function getOffset($pageNumber, $pageSize) {
        return ($pageNumber - 1) * $pageSize;
    }

    static function getTotalPages($totalItems, $pageSize) {
        return ceil($totalItems / $pageSize);
    }
}