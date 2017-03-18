<?php
require_once("app.php");
$postService = new \Service\Post\PostService($db);

if (!isset ($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$data = $postService->getPost($_GET['postId']);
if (!($_SESSION['id'] == $data->getUserId())) {
    header("Location: index.php");
    exit;
}
if (isset($_POST['editPost'])) {
    if (isset($_SESSION['errorMsg'])) {
        header("Location: edit_post.php?postId={$_GET['postId']}");
        exit;
    }
    if ($postService->editPost($_POST['title'], $_POST['about'], $_POST['content'], $_GET['postId'])) {
        header("Location: post.php?postId={$_GET['postId']}");
        exit;
    }
}

$app->loadTemplate("edit_post_frontend", $data);
