<?php
require_once("app.php");
$postService = new \Service\Post\PostService($db);
if (!isset ($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
$post = $postService->getPost($_GET['postId']);
if (!($_SESSION['id'] == $post->getUserId())) {
    header("Location: index.php");
    exit;
}
$postService->deletePost($_GET['postId']);
header("Location: index.php");
exit;


