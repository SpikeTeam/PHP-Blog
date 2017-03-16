<?php
require_once 'app.php';

use Service\Post\PostService;
$_SESSION['id'] = 1;
$postService = new PostService($db);
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['createPost'])) {
    $postService->createPost($_POST['title'], $_POST['about'], $_POST['content']);
}

$app->loadTemplate("create_post_frontend");