<?php
require_once('app.php');

$postService = new \Services\Post\PostService($db);
$data = $postService->getPosts();

$app->loadTemplate('all_posts_frontend', $data);
