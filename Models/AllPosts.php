<?php

namespace Models;


class AllPosts
{
    /**
     * @var Post[]
     */
    private $posts;

    /**
     * @param callable $callable
     */
    public function setPosts(callable $callable)
    {
        $generator = $callable();
        $this->posts = $generator;
    }

    public function getPosts()
    {
        return $this->posts;
    }
}