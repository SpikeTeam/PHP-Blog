<?php

namespace Services\Encryption;

interface IEncryption
{
    public function encrypt($password) : string;

    public function isValid($passwordHash, $password) : bool;
}