<?php

namespace App\CQRS\Handlers\Products;

use App\CQRS\Commands\Products\CreateProductCommand;
use App\Models\Product;

class CreateProductHandler
{
    public function handle(CreateProductCommand $command): Product
    {
        return Product::create([
            'name' => $command->name,
            'description' => $command->description,
            'price' => $command->price
        ]);
    }
}