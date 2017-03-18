<?php

namespace Adapter;


interface IDataBase
{
    public function prepare(string $sql) : IDataBaseStatement;

    public function lastId();

    public function errorInfo();
}