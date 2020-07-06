<?php

include "Views/ViewRenderer.php";
include "ViewModels/Home/AboutViewModel.php";

class HomeController
{
    public function index() {
        ViewRenderer::render("Views/Home/Index.php", "Homepage");
    }

    public function about() {
        $photos = array(
            "Bridge" => "../client-side/images/bridge.jpg",
            "Greens" => "../client-side/images/green.jpeg",
            "Statue" => "../client-side/images/statue.jpg",
            "Cock" => "../client-side/images/cock.jpg",
            "City" => "../client-side/images/city.jpg",
            "Fire" => "../client-side/images/fire.jpg"
        );
        $viewModel = new AboutViewModel($photos);
        ViewRenderer::render("Views/Home/About.php", "About me", $viewModel);
    }
}