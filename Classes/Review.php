<?php
class Review
{
    public $id;
    public $review;
    public $date;
    public $product_id;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->category_id, 'integer');
    }
}