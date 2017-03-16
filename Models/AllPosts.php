<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 16.3.2017 г.
 * Time: 18:53
 */

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