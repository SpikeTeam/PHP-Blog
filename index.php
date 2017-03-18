<?php
require_once('app.php');

$postService = new \Services\Post\PostService($db);
$data = $postService->getPosts(5);

$app->loadTemplate('index_frontend', $data);
