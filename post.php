<?php
require_once("app.php");
$postService = new \Service\Post\PostService($db);

$data = $postService->getPost($_GET['postId']);
$app->loadTemplate("post_frontend",$data);
