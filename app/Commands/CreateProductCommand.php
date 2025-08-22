<?php

namespace App\Commands;

class CreateProductCommand
{
    public $name;
    public $description;
    public $price;

    public function __construct($name, $description, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}