<?php
require_once("app.php");
$postService = new \Services\Post\PostService($db);
$data = $postService->getPost($_GET['postId']);

$app->loadTemplate("post_frontend", $data);
