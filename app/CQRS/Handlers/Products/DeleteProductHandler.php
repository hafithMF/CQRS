<?php

namespace App\CQRS\Handlers\Products;

use App\CQRS\Commands\Products\DeleteProductCommand;
use App\Models\Product;
class DeleteProductHandler
{
    public function handle(DeleteProductCommand $command): int
    {
        return Product::destroy($command->id);
    }
}