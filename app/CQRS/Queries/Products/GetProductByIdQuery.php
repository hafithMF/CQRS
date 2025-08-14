<?php

namespace App\CQRS\Queries\Products;

class GetProductByIdQuery
{
    public function __construct(
        public int $id
    ) {}
}