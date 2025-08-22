<?php

namespace App\Queries\QueryHandlers;

use App\Queries\GetAllProductsQuery;
use App\Interfaces\ProductServiceInterface;

class GetAllProductsQueryHandler
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function handle(GetAllProductsQuery $query)
    {
        return $this->productService->getAllProducts();
    }
}