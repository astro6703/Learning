<?php

require_once "Views/ViewRenderer.php";
require_once "ViewModels/Home/AboutViewModel.php";

class HomeController
{
    private $photosRepository;

    public function __construct(IContainer $container) {
        $this->photosRepository = $container->resolve("IPhotosRepository");
    }

    public function index() {
        ViewRenderer::render("Views/Home/Index.php", "Homepage");
    }

    public function about() {
        $viewModel = new AboutViewModel($this->photosRepository->getAll());
        ViewRenderer::render("Views/Home/About.php", "About me", $viewModel);
    }

    public function interests() {
        ViewRenderer::render("Views/Home/Interests.php", "My interests");
    }

    public function learning() {
        ViewRenderer::render("Views/Home/Learning.php", "Learning");
    }

    public function photos() {
        ViewRenderer::render("Views/Home/Photos.php", "Photo album");
    }

    public function history() {
        ViewRenderer::render("Views/Home/History.php", "History");
    }
}