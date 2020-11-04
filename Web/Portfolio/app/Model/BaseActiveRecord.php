<?php

require_once "PortfolioPdo.php";

abstract class BaseActiveRecord {
    protected static $pdo;
    private static $tablename;
    private static $className;
    private static $dbfields = array();

    protected $id;

    public function __construct() {
        static::setupConnection();
    }

    private static function setupConnection() {
        static::$pdo = PortfolioPdo::getInstance();
    }

    public static function find($id) {
        static::setupConnection();

        $sql = "SELECT * FROM " . static::$tablename . " WHERE id=$id";
        $stmt = static::$pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::$className);
        $stmt->execute();
        $result = $stmt->fetch();

        if (!$result) {
            throw new Exception("Entity " . static::$className . " was not found.");
        }

        return $result;
    }

    public static function findAll() {
        static::setupConnection();

        $sql = "SELECT * FROM " . static::$tablename;
        $stmt = static::$pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::$className);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function findByPage($offset, $rowsPerPage) {
        static::setupConnection();

        $sql = "SELECT * FROM " . static::$tablename . " ORDER BY createdAt DESC LIMIT " . "$offset , $rowsPerPage";
        $stmt = static::$pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::$className);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getCount() {
        static::setupConnection();

        $sql = "SELECT COUNT(*) FROM " . static::$tablename;
        $stmt = static::$pdo->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return current($result);
    }

    private static function getFieldTypes() {
        $stmt = static::$pdo->query("SHOW FIELDS FROM " . static::$tablename);
        $fieldTypesTableRows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $fieldNameToType = array();
        foreach ($fieldTypesTableRows as $row) {
            $fieldNameToType[$row["Field"]] = $row["Type"];
        }

        return $fieldNameToType;
    }

    private function wrapWithQuotesIfNeeded($fieldValue, $fieldType) {
        if (substr($fieldType, 0, 7) == "varchar" || substr($fieldType, 0, 8) == "datetime") {
            return "'" . $fieldValue . "'";
        }
        return $fieldValue;
    }

    public function save() {
        $data = array();
        $fieldTypes = static::getFieldTypes();

        foreach (static::$dbfields as $fieldName) {
            $data[$fieldName] = $this->wrapWithQuotesIfNeeded($this->{$fieldName}, $fieldTypes[$fieldName]);
        }

        return $this->saveInternal($data);
    }

    private function saveInternal($data) {
        $values = implode(",", $data);
        $fields = implode(",", static::$dbfields);

        $stmt = static::$pdo->prepare("INSERT INTO " . static::$tablename .  " ($fields) VALUES ($values)");
        $stmt->execute();

        return static::$pdo->lastInsertId();
    }

    public function delete() {
        $sql = "DELETE FROM " . static::$tablename . " WHERE id = " .$this->id;
        $stmt = static::$pdo->query($sql);

        $stmt->execute();
    }
}