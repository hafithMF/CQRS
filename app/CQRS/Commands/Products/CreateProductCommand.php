<?php

namespace App\CQRS\Commands\Products;

class CreateProductCommand
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price
    ) {}
}