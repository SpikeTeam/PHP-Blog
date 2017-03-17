<?php

namespace Services\Encryption;


class BCryptService implements IEncryption
{
    public function encrypt($password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function isValid($passwordHash, $password): bool
    {
        return password_verify($password, $passwordHash);
    }

}