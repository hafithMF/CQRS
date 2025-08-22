<?php

namespace App\Commands\Handlers;

use App\Commands\DeleteProductCommand;
use App\Interfaces\ProductServiceInterface;

class DeleteProductHandler
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function handle(DeleteProductCommand $command)
    {
        return $this->productService->deleteProduct($command->productId);
    }
}