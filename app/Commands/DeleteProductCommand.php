<?php

namespace App\Commands;

class DeleteProductCommand
{
    public $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }
}