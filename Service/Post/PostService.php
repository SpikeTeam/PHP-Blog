<?php
namespace Service\Post;

use Adapter\IDataBase;
use Models\Post;
use Models\Posts;

/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 15.3.2017 г.
 * Time: 17:16
 */
class PostService implements IPostService
{
    private $db;

    public function __construct(IDataBase $db)
    {
        $this->db = $db;
    }

    public function createPost(string $title, string $about, string $content)
    {
        $datePosted = date("Y/m/d H:i:s");
        $userId = $_SESSION['id'];
        $categoryId = 1;
        $title = trim($title);
        if(strlen($title)<5){
            $_SESSION['errorMsg'] = "Title length must be at least 5 characters";
            return false;
        }
        if(strlen($about)<10){
            $_SESSION['errorMsg'] = "Intro length must be at least 10 characters";
            return false;
        }
        if(strlen($content)<20){
            $_SESSION['errorMsg'] = "Intro length must be at least 20 characters";
            return false;
        }
        $query = "INSERT INTO `post` (
                                    `title`, 
                                    `about`,
                                    `content`,
                                    `date_posted`,
                                    `user_id`,
                                    `category_id`
                                    
                                    ) VALUES(
                                    ? ,
                                    ? ,
                                    ? ,
                                    ? ,
                                    ?,
                                    ?
                                    );";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$title, $about, $content, $datePosted, $userId, $categoryId]);
        return true;
    }

    public function getPosts($limit = null)
    {

        $data = new Posts();

        $stmt = $this->db->prepare("SELECT id, title, about, content, user_id, date_posted  FROM post WHERE deleted_on is NULL ORDER BY date_posted DESC ");
        $stmt->execute();
        $callable = function () use ($stmt, $limit) {
            $br = 0;
            while ($post = $stmt->fetchObject(Post::class)) {
                if ($br++ === $limit) break;
                $post->setAuthor($this->getUsername($post->getUserId()));
                yield $post;
            }
        };
        $data->setPosts($callable);
        return $data;
    }

    public function getPost($id): Post
    {
        $stmt = $this->db->prepare("SELECT id, title, about, content, user_id, date_posted FROM post WHERE id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetchObject(Post::class);
        $data->setAuthor($this->getUsername($data->getUserId()));
        return $data;
    }

    public function getUsername($id)
    {
        $stmt = $this->db->prepare("SELECT username FROM user WHERE id =?");
        $stmt->execute([$id]);
        $username = $stmt->fetchRow();
        $username = $username['username'];
        return $username;
    }

    public function editPost($title, $about, $content, $id)
    {
        if(strlen($title)<5){
            $_SESSION['errorMsg'] = "Title length must be at least 5 characters";
            return false;
        }
        if(strlen($about)<10){
            $_SESSION['errorMsg'] = "Intro length must be at least 10 characters";
            return false;
        }
        if(strlen($content)<20){
            $_SESSION['errorMsg'] = "Intro length must be at least 20 characters";
            return false;
        }
        $query = "UPDATE `post` SET 
                                    `title` = ?, 
                                    `about` = ?,
                                    `content` = ?
                                                                              
                                    WHERE 
                                    `id` = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$title, $about, $content, $id]);
        return true;
    }

    public function deletePost($id)
    {
        $dateDeleted = date("Y/m/d H:i:s");
        $query = "UPDATE `post` SET 
                                    deleted_on = ?                                                                             
                                    WHERE 
                                    `id` = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$dateDeleted,$id]);
    }
}