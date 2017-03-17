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
    }

    public function getPosts($limit = null)
    {

        $data = new Posts();

        $stmt = $this->db->prepare("SELECT id, title, about, content, user_id, date_posted  FROM post ORDER BY date_posted DESC");
        $stmt->execute();

        $callable = function () use ($stmt, $limit) {
            $br = 0;
            while ($post = $stmt->fetchObject(Post::class)) {
                if($br++ === $limit) break;
                $post->setAuthor($this->getUsername($post->getUserId()));
                yield $post;
            }
        };
        $data->setPosts($callable);
        return $data;
    }

    public function getPost($id)
    {
        $stmt = $this->db->prepare("SELECT id, title, about, content, user_id, date_posted FROM post WHERE id = ?");
        $stmt->execute([$id]);

        $data = $stmt->fetchObject(Post::class);
        $data->setAuthor($this->getUsername($data->getUserId()));
        return $data;
    }
    public function getUsername($id){
        $stmt = $this->db->prepare("SELECT username FROM user WHERE id =?");
        $stmt->execute([$id]);
        $username = $stmt->fetchRow();
        $username = $username['username'];
        return $username;
    }

}