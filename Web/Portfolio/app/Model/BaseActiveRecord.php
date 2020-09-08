<?php


abstract class BaseActiveRecord {
    protected int $id;
    protected array $queryData;
    protected string $updateClause;
    protected string $insertClause;

    protected string $tableName;
    protected string $className;
    protected PDO $pdo;

    public function __construct() {
        $dsn = "sqlsrv:Server=localhost;Database=Portfolio";
        try {
            $this->pdo = new PDO($dsn,
                                 null,
                                 null,
                                 [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getById(int $id) {
        $stmt = $this->pdo->prepare("select top(1) from $this->tableName where deletedAt is null and id = :id");
        $stmt->execute(["id" => $id]);

        return $stmt->fetchAll(PDO::FETCH_CLASS, $this->className)[0];
    }

    public function getAll() {
        return $this->pdo->query("select * from $this->tableName where deletedAt is null")
                         ->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public abstract function save(): int;
//    {
//        $entity = $this->getById($this->id);
//
//        if ($entity) {
//            $this->pdo->prepare($this->updateClause)
//                      ->execute($this->queryData);
//        } else {
//            $this->pdo->prepare($this->insertClause)
//                      ->execute($this->queryData);
//        }
//    }

    public function delete(int $id) {
        $stmt = $this->pdo->prepare("delete from $this->tableName where deletedAt is null and id = :id");

        return $stmt->execute(["id" => $id]);
    }
}