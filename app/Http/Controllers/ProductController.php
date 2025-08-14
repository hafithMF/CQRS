<?php

namespace App\Http\Controllers;

use App\CQRS\Commands\Products\CreateProductCommand;
use App\CQRS\Commands\Products\UpdateProductCommand;
use App\CQRS\Commands\Products\DeleteProductCommand;
use App\CQRS\Handlers\Products\CreateProductHandler;
use App\CQRS\Handlers\Products\UpdateProductHandler;
use App\CQRS\Handlers\Products\DeleteProductHandler;
use App\CQRS\Queries\Products\GetAllProductsQuery;
use App\CQRS\Queries\Products\GetProductByIdQuery;
use App\CQRS\QueryHandlers\Products\GetAllProductsQueryHandler;
use App\CQRS\QueryHandlers\Products\GetProductByIdQueryHandler;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private GetAllProductsQueryHandler $getAllProductsQueryHandler,
        private GetProductByIdQueryHandler $getProductByIdQueryHandler,
        private CreateProductHandler $createProductHandler,
        private UpdateProductHandler $updateProductHandler,
        private DeleteProductHandler $deleteProductHandler
    ) {}

    public function index()
    {
        $query = new GetAllProductsQuery();
        return $this->getAllProductsQueryHandler->handle($query);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $command = new CreateProductCommand(
            $request->name,
            $request->description,
            $request->price
        );

        return $this->createProductHandler->handle($command);
    }

    public function showin(int $id)
    {
        $query = new GetProductByIdQuery($id);
        return $this->getProductByIdQueryHandler->handle($query);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'sometimes|string',
        'description' => 'sometimes|string',
        'price' => 'sometimes|numeric'
    ]);

    $command = new UpdateProductCommand(
        $id,
        $request->input('name'),
        $request->input('description'),
        $request->input('price')
    );

    return $this->updateProductHandler->handle($command);
}
    public function destroy($id)
    {
        $command = new DeleteProductCommand($id);
        return $this->deleteProductHandler->handle($command);
    }
}