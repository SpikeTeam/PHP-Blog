<?php

namespace Adapter;

use PDO;

class PdoDatabase implements  IDataBase
{
    /**
     * @var \PDO;
     */
    private $pdo;

    public function __construct(string $host, string $dbName, string $user, string $pass)
    {
        $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare(string $sql): IDataBaseStatement
    {
        return new PdoDatabaseStatement($this->pdo->prepare($sql));
    }

    public function lastId()
    {
        return $this->pdo->lastInsertId();
    }

    public function errorInfo()
    {
        return $this->pdo->errorInfo();
    }
}