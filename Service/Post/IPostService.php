<?php

namespace Service\Post;


interface IPostService
{
    public function createPost(string $title, string $about, string $content);
}