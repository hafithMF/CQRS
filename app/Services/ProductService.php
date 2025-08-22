<?php

namespace App\Services;

use App\Exceptions\NotFound;
use function Symfony\Component\Clock\now;
use App\Interfaces\ProductServiceInterface;
use App\Interfaces\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
        
    }

    public function getProductById($productId)
    {
        $product = $this->productRepository->getProductById($productId);

        if (!$product) {
            throw new \App\Exceptions\NotFound(message: 'Product not found');
        }

        return $product;
    }

    public function createProduct(array $productDetails)
    {
        return $this->productRepository->createProduct($productDetails);
    }

    public function updateProduct($productId, array $productDetails)
    {
        return $this->productRepository->updateProduct($productId, $productDetails);
    }

    public function deleteProduct($productId)
    {
        return $this->productRepository->deleteProduct($productId);
    }
}