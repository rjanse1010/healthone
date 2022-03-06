<?php


class Review
{
    public $id;
    public $name;
    public $title;
    public $text;
    public $rating;
    public $product_id;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}