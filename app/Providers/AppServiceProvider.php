<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CQRS\QueryHandlers\Products\GetAllProductsQueryHandler;
use App\CQRS\QueryHandlers\Products\GetProductByIdQueryHandler;
use App\CQRS\Handlers\Products\CreateProductHandler;
use App\CQRS\Handlers\Products\UpdateProductHandler;
use App\CQRS\Handlers\Products\DeleteProductHandler;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(GetAllProductsQueryHandler::class, function ($app) {
            return new GetAllProductsQueryHandler();
        });

        $this->app->bind(GetProductByIdQueryHandler::class, function ($app) {
            return new GetProductByIdQueryHandler();
        });

        $this->app->bind(CreateProductHandler::class, function ($app) {
            return new CreateProductHandler();
        });

        $this->app->bind(UpdateProductHandler::class, function ($app) {
            return new UpdateProductHandler();
        });

        $this->app->bind(DeleteProductHandler::class, function ($app) {
            return new DeleteProductHandler();
        });
    }
}