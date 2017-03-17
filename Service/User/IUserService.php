<?php

namespace Services\User;

interface IUserService
{
    public function register($username, $password, $firstName, $lastName,
            $email, $personalInfo, $profilePic) : bool;

    public function login($username, $passwordHash);

    public function exist($username) : bool;

    public function isPasswordMatch($password, $confirmPassword) : bool;
}