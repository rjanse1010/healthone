<?php


class OpeningTimes
{
    public $id;
    public $name;
    public $time_open;
    public $time_close;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}