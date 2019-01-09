<?php

namespace App\Lib;

class User 
{
    private $id = 0;
    private $firstname = "";
    private $lastname = "";
    private $username = "";
    private $password = "";

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setUsername($username) 
    {
        $this->username = $username;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->lastname;
    }

    public function getFirtsname()
    {
        return $this->firstname;
    }

    public function setPassword($password) 
    {
        $this->password = $password;
    }   

    public function passwordVerify($password)
    {
        return !empty($this->password) && password_verify($password, $this->password);
    }
}
