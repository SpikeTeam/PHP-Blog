<?php

namespace Models;

class User
{
    private $id;
    private $username;
    private $passwordHash;
    private $email;
    private $fullName;
    private $personalInfo;
    private $profilePic;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getPersonalInfo()
    {
        return $this->personalInfo;
    }

    public function setPersonalInfo($personalInfo)
    {
        $this->personalInfo = $personalInfo;
    }

    public function getProfilePic()
    {
        return $this->profilePic;
    }

    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
    }
}