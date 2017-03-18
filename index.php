<?php
require_once('app.php');
$postService = new \Service\Post\PostService($db);
$test = $postService->getPosts(5);
$data = $test;
$app->loadTemplate('index_frontend', $data);
