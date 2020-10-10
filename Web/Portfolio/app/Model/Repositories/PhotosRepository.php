<?php

require_once "IPhotosRepository.php";

class PhotosRepository implements IPhotosRepository {
    function getAll() {
        return array(
            "Bridge" => "../client-side/images/bridge.jpg",
            "Greens" => "../client-side/images/green.jpeg",
            "Statue" => "../client-side/images/statue.jpg",
            "Cock" => "../client-side/images/cock.jpg",
            "City" => "../client-side/images/city.jpg",
            "Fire" => "../client-side/images/fire.jpg"
        );
    }
}