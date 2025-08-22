<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($productId)
    {
        return Product::findOrFail($productId);
    }

    public function createProduct(array $productDetails)
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productId, array $productDetails)
    {
        $product = Product::findOrFail($productId);
        $product->update($productDetails);
        return $product;
    }

    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);
        return $product->delete();
    }
}