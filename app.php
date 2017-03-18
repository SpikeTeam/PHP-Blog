<?php
session_start();
spl_autoload_register(function ($class){
   require_once $class . '.php';
});
date_default_timezone_set(\Config\DtConfig::DT_TIME_ZONE);
$app = new \Core\Application();
$db = new \Adapter\PdoDatabase(
    \Config\DbConfig::DB_HOST,
    \Config\DbConfig::DB_NAME,
    \Config\DbConfig::DB_USER,
    \Config\DbConfig::DB_PASS
);