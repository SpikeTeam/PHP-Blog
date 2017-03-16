<?php
require_once('app.php');

$postService = new \Service\Post\PostService($db);

$test = $postService->getAllPosts();
$data = $test;
$app->loadTemplate('index_frontend', $data);
