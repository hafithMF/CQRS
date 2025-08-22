<?php

namespace App\Interfaces;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($productId);
    public function createProduct(array $productDetails);
    public function updateProduct($productId, array $productDetails);
    public function deleteProduct($productId);
} 