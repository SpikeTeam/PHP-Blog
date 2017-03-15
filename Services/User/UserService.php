<?php
declare(strict_types=1);

namespace Services\User;

use Adapter\IDataBase;
use Models\User;

class UserService implements IUserService
{
    private $db;

    public function __construct(IDataBase $db)
    {
        $this->db = $db;
    }

    public function register($username, $password, $firstName, $lastName,
                             $email, $personalInfo, $profilePic): bool
    {
        $stmt = $this->db->prepare("INSERT INTO `user`(
                                      `username`, `password`,
                                      `first_name`, `last_name`,
                                      `email`, `personal_info`,
                                      `profile_picture`
                                    )
                                    VALUES(?, ?, ?, ?, ?, ?, ?);");

        return $stmt->execute([$username, $password, $firstName, $lastName, $email, $personalInfo, $profilePic]);
    }

    public function login($username, $passwordHash)
    {
        $stmt = $this->db->prepare("SELECT id, username, password
                                    FROM `user`
                                    WHERE `username` = ?");

        $stmt->execute([$username]);
        $user = $stmt->fetchRow();

        if(!$user){
            throw new \Exception("Username does not exist!");
        }

        if($user['password'] != $passwordHash){
            throw new \Exception("Password mismatch");
        }

        return $user['id'];
    }

    public function exist($username): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM `user` WHERE `username` = ?");
        $stmt->execute([$username]);

        return $stmt->fetchRow();
    }

    public function isPasswordMatch($password, $confirmPassword): bool
    {
        return $password == $confirmPassword;
    }

}