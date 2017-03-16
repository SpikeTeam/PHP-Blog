<?php

namespace Services\User;

interface IUserService
{
    public function register($params = []) : bool;

    public function login($username, $passwordHash);

    public function exist($username) : bool;

}