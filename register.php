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

    $avatarUrl = null;
    if($_FILES['avatar']['name'] != '') {
        $uploadService = new \Services\Upload\UploadService();
        $avatarUrl = $uploadService->upload($_FILES['avatar'], 'pictures');
    }

    $user = new \Services\User\UserService($db);

    if($user->register($_POST, $avatarUrl)){
        header('Location: login.php');
    }
}

$app->loadTemplate('registration_frontend');