<?php


class Review
{
    public $id;
    public $user_id;
    public $title;
    public $text;
    public $rating;
    public $product_id;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->user_id, 'integer');
        settype($this->product_id, 'integer');
    }
}