<?php

namespace App\Queries\QueryHandlers;

use App\Queries\GetProductByIdQuery;
use App\Interfaces\ProductServiceInterface;

class GetProductByIdQueryHandler
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function handle(GetProductByIdQuery $query)
    {
        return $this->productService->getProductById($query->productId);
    }
}