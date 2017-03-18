<?php

namespace Adapter;

class PdoDatabaseStatement implements  IDataBaseStatement
{
    /**
     * @var \PDOStatement
     */
    private $statement;

    public function __construct(\PDOStatement $statement)
    {
        $this->statement = $statement;
    }

    public function execute(array $params = [])
    {
        $result = null;
        try {
            $result = $this->statement->execute($params);
        } catch (\Exception $e){
            throw new \Exception("The username is already exist.");
        }

        return $result;
    }

    public function fetchRow()
    {
        return $this->statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchObject($className)
    {
        return $this->statement->fetchObject($className);
    }

}