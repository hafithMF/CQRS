<?php

namespace App\CQRS\QueryHandlers\Products;

use App\CQRS\Queries\Products\GetProductByIdQuery;
use App\Models\Product;

class GetProductByIdQueryHandler
{
    public function handle(GetProductByIdQuery $query)
    {
        return Product::findOrFail($query->id);
    }
}

