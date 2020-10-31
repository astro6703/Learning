<?php


class PortfolioPdo {
    private static $instance;

    public static function getInstance() {
        if (empty(static::$instance)) {
            static::$instance = static::createInstance();
        }
        return static::$instance;
    }

    private function __construct() { }

    private static function createInstance() {
        try {
            $dsn = "mysql:dbname=portfolio;host=127.0.0.1";
            return new PDO($dsn, 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $exception) {
            die($exception);
        }
    }
}