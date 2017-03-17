<?php
require_once('app.php');

$postService = new \Service\Post\PostService($db);

$test = $postService->getPosts();
$data = $test;
$app->loadTemplate('all_posts_frontend', $data);
