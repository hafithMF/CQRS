<?php

namespace App\CQRS\Commands\Products;

class DeleteProductCommand
{
    public function __construct(
        public int $id
    ) {}
}