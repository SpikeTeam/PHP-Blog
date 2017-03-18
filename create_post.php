<?php
require_once 'app.php';

use Service\Post\PostService;

$postService = new PostService($db);
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
if (isset($_SESSION['errorMsg'])) {
    header('Location: create_post.php');
    exit;
}
if (isset($_POST['createPost'])) {
    if ($postService->createPost($_POST['title'], $_POST['about'], $_POST['content'])) {
        header('Location: index.php');
        exit;
    }
}
$app->loadTemplate("create_post_frontend");