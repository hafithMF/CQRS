<?php

namespace App\CQRS\QueryHandlers\Products;

use App\CQRS\Queries\Products\GetAllProductsQuery;
use App\Models\Product;

class GetAllProductsQueryHandler
{
    public function handle(GetAllProductsQuery $query)
    {
        return Product::all();
    }
}