<?php


class User
{
    public $id;
    public $username;
    public $is_admin;
    public $password;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}