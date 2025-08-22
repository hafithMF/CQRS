<?php

namespace App\Commands;

class UpdateProductCommand
{
    public $productId;
    public $name;
    public $description;
    public $price;

    public function __construct($productId, $name, $description, $price)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}