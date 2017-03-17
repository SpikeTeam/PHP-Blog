<?php
require_once 'app.php';

if(!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$app->loadTemplate('profile_frontend');
