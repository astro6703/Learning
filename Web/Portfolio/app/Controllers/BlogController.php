<?php

require_once "Views/ViewRenderer.php";
require_once "Validators/BlogRequestValidator.php";
require_once "ViewModels/Blog/BlogEntriesViewModel.php";
require_once "ViewModels/Shared/ValidationViewModel.php";
require_once "Model/BlogEntry.php";
require_once "Model/PaginationHelper.php";

class BlogController {
    private $pageSize = 10;

    public function __construct(IContainer $container) { }

    public function index() {
        $page = isset($_GET['page'])
            ? $_GET['page']
            : 1;

        $offset = PaginationHelper::getOffset($page, $this->pageSize);
        $answers = BlogEntry::findByPage($offset, $this->pageSize);

        $totalPages = PaginationHelper::getTotalPages(BlogEntry::getCount(), $this->pageSize);
        $paginationViewModel = new PaginationViewModel($page, $totalPages, "/Blog/Index");
        $viewModel = new BlogEntriesViewModel($answers, $paginationViewModel);

        ViewRenderer::render("Views/Blog/Index.php", "Blog", $viewModel);
    }

    public function post() {
        $viewModel = new ValidationViewModel(true, array());
        ViewRenderer::render("Views/Blog/Post.php", "Post", $viewModel);
    }

    public function uploadPost() {
        $validator = new BlogRequestValidator($_POST, $_FILES);
        $validationResult = $validator->validate();

        if ($validationResult->isValid) {
            $picturePath = $_FILES["Picture"]["tmp_name"];
            $pictureName = $_FILES["Picture"]["name"];
            $picture = file_get_contents($picturePath);
            file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/client-side/images/" . $pictureName, $picture);

            $blogEntry = new BlogEntry();
            $blogEntry->createdAt = date("Y-m-d H:i:s");
            $blogEntry->name = $_POST["Name"];
            $blogEntry->message = $_POST["Message"];
            $blogEntry->photoName = $pictureName;
            $blogEntry->subject = $_POST["Subject"];
            $blogEntry->save();

            $this->index();
            return;
        }

        $viewModel = new ValidationViewModel($validationResult->isValid, $validationResult->errors);
        ViewRenderer::render("Views/Blog/Post.php", "Post", $viewModel);
    }
}