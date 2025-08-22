<?php

namespace App\Http\Controllers;

use App\Commands\CreateProductCommand;
use App\Commands\DeleteProductCommand;
use App\Commands\UpdateProductCommand;
use App\Commands\Handlers\CreateProductHandler;
use App\Commands\Handlers\DeleteProductHandler;
use App\Commands\Handlers\UpdateProductHandler;
use App\Queries\GetAllProductsQuery;
use App\Queries\GetProductByIdQuery;
use App\Queries\QueryHandlers\GetAllProductsQueryHandler;
use App\Queries\QueryHandlers\GetProductByIdQueryHandler;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(
        GetAllProductsQueryHandler $handler,
        GetAllProductsQuery $query
    ): JsonResponse {
        $products = $handler->handle($query);
        return response()->json($products);
    }

    public function show(
        $id,
        GetProductByIdQueryHandler $handler
    ): JsonResponse {
        $query = new GetProductByIdQuery($id);
        $product = $handler->handle($query);
        
        return response()->json($product);
    }

    public function store(
        CreateProductRequest $request,
        CreateProductHandler $handler
    ): JsonResponse {
        $validated = $request->validated();

        $command = new CreateProductCommand(
            $validated['name'],
            $validated['description'] ?? '',
            $validated['price']
        );

        $product = $handler->handle($command);

        return response()->json($product, 201);
    }

    public function update(
        UpdateProductRequest $request,
        $id,
        UpdateProductHandler $handler
    ): JsonResponse {
        $validated = $request->validated();

        $command = new UpdateProductCommand(
            $id,
            $validated['name'] ?? null,
            $validated['description'] ?? null,
            $validated['price'] ?? null
        );

        $product = $handler->handle($command);

        return response()->json($product);
    }

    public function destroy(
        $id,
        DeleteProductHandler $handler
    ): JsonResponse {
        $command = new DeleteProductCommand($id);
        $handler->handle($command);

        return response()->json(null, 204);
    }
}