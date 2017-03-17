<?php

namespace Services\User;

interface IUserService
{
    public function register($params = [], $avatarUrl) : bool;

    public function login($username, $passwordHash);

    public function exist($username) : bool;

}