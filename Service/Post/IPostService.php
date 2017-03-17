<?php

namespace Service\Post;


interface IPostService
{
    public function __construct(IDataBase $db);

    public function getPosts($limit = null);

    public function getPost($id);

    public function createPost(string $title, string $about, string $content);
}
