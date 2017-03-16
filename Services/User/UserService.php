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

        try {
            $isRegister = $stmt->execute([$_POST['username'], $passwordHash, $_POST['firstName'],
                $_POST['lastName'], $_POST['email'], $_POST['personalInfo'], $avatarUrl]);

            return $isRegister;
        } catch (\Exception $e){
            $_SESSION['errorMsg'] = $e->getMessage();
        }

        return false;
    }

    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT id, username, password
                                    FROM `user`
                                    WHERE `username` = ?");

        $stmt->execute([$username]);
        $user = $stmt->fetchRow();

        if(!$user){
            throw new \Exception("Username does not exist!");
        }

        if(!$this->encrypt->isValid($user['password'], $password)){
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
}