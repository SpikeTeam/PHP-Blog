<?php
declare(strict_types=1);

namespace Services\User;

use Adapter\IDataBase;
use Models\User;
use Services\Encryption\BCryptService;

class UserService implements IUserService
{
    private $db;
    private $encrypt;

    public function __construct(IDataBase $db)
    {
        $this->db = $db;
        $this->encrypt = new BCryptService();
    }

    public function register($params = [], $avatarUrl): bool
    {
        $isValid = $this->isValidData($params);

        if (!$isValid)
            return false;

        $passwordHash = $this->encrypt->encrypt($_POST['password']);

        $stmt = $this->db->prepare("INSERT INTO `user`(
                                      `username`, `password`,
                                      `first_name`, `last_name`,
                                      `email`, `personal_info`,
                                      `profile_picture`
                                    )
                                    VALUES(?, ?, ?, ?, ?, ?, ?);");

        $isRegister = false;
        try {
            $isRegister = $stmt->execute([$_POST['username'], $passwordHash, $_POST['firstName'],
                $_POST['lastName'], $_POST['email'], $_POST['personalInfo'], $avatarUrl]);
        } catch (\Exception $e){
            $_SESSION['errorMsg'] = $e->getMessage();
        }

        return $isRegister;
    }

    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT 
                                      `id`, `username`, `password` as `passwordHash`,
                                      CONCAT_WS(' ', `first_name`, `last_name`) AS `fullName`,
                                      `email`, `personal_info` AS `personalInfo`,
                                      `profile_picture` AS `profileUrl`
                                    FROM `user`
                                    WHERE `username` = ?;");

        $stmt->execute([$username]);

        /**
         * @var User
         */
        $user = $stmt->fetchObject(User::class);

        if(!$user){
            throw new \Exception("Username does not exist!");
        }

        if(!$this->encrypt->isValid($user->getPasswordHash(), $password)){
            throw new \Exception("Password mismatch");
        }

        $this->enterInfoSession($user);

        return $user->getId();
    }

    public function exist($username): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM `user` WHERE `username` = ?");
        $stmt->execute([$username]);

        return $stmt->fetchRow();
    }

    private function enterInfoSession(User $user)
    {
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['fullName'] = $user->getFullName();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['personalInfo'] = $user->getPersonalInfo();
        $_SESSION['profileUrl'] = $user->getProfileUrl();

        $this->getCountPosts();
        $this->getCountComments();
    }

    private function isValidData($params = []) : bool
    {
        if(preg_match("[ ]", $params['username']))
            return false;

        if(($params['password'] != $params['passwordConfirm']) ||
            (preg_match("[ ]", $params['password'])))
            return false;

        if(!filter_var($params['email'], FILTER_VALIDATE_EMAIL))
            return false;

        return true;
    }

    // get the count of the created post by this user
    private function getCountPosts()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS `countPosts`
                            FROM `post`
                            WHERE `post`.`user_id` = ?; ");

        $stmt->execute([$_SESSION['id']]);
        $_SESSION['countPosts'] = $stmt->fetchRow();
    }

    private function getCountComments()
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS `countComments`
                                    FROM `comment`
                                    WHERE `comment`.`user_id` = ?;");

        $stmt->execute([$_SESSION['id']]);

        $_SESSION['countComments'] = $stmt->fetchRow();
    }
}