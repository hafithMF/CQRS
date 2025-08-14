<?php

namespace App\CQRS\Commands\Products;

class UpdateProductCommand
{
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?string $description = null,
        public ?float $price = null
    ) {}
}