<?php

namespace App\CQRS\Handlers\Products;

use App\CQRS\Commands\Products\UpdateProductCommand;
use App\Models\Product;

class UpdateProductHandler
{
    public function handle(UpdateProductCommand $command): Product
    {
         $product = Product::findOrFail($command->id);
        
        $updateData = array_filter([
            'name' => $command->name,
            'description' => $command->description,
            'price' => $command->price
        ], function($value) {
            return $value !== null;
        });
        
        $product->update($updateData);
        
        return $product->fresh();
    }
}