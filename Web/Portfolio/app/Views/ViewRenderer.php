<?php

require_once "Views/Shared/ViewHelper.php";

class ViewRenderer
{
    static function render($viewName, $title, $viewModel = NULL, $layout = 'Layout.php')
    {
        require_once "Views/Shared/".$layout;
    }
}