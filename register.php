<?php
require_once 'app.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['passwordConfirm'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $personalInfo = $_POST['personalInfo'];
    $email = $_POST['email'];

    $avatar = $_FILES['avatar'];
}

$app->loadTemplate('registration_frontend');