<?php
require_once 'app.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userService = new \Services\User\UserService($db);

    $id = $exception = null;
    try {
        $id = $userService->login($username, $password);
    } catch (Exception $e){
        $_SESSION['error'] = $e->getMessage();
    }

    if(isset($_SESSION['error'])){
        header('Location: login.php');
        exit;
    }

    $_SESSION['id'] = $id;

    header('Location: profile.php');
    exit;
}

$postService = new \Services\Post\PostService($db);
$data = $postService->getPosts(5);

$app->loadTemplate('index_frontend', $data);