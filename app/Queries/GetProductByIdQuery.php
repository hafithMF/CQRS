<?php

namespace App\Queries;

class GetProductByIdQuery
{
    public $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }
}