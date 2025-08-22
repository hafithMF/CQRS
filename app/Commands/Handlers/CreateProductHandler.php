<?php

namespace App\Commands\Handlers;

use App\Commands\CreateProductCommand;
use App\Interfaces\ProductServiceInterface;

class CreateProductHandler
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function handle(CreateProductCommand $command)
    {
        $productDetails = [
            'name' => $command->name,
            'description' => $command->description,
            'price' => $command->price
        ];

        return $this->productService->createProduct($productDetails);
    }
}