<?php

namespace App\Commands\Handlers;

use App\Commands\UpdateProductCommand;
use App\Interfaces\ProductServiceInterface;

class UpdateProductHandler
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function handle(UpdateProductCommand $command)
    {
        $productDetails = [
            'name' => $command->name,
            'description' => $command->description,
            'price' => $command->price
        ];

        return $this->productService->updateProduct($command->productId, $productDetails);
    }
}