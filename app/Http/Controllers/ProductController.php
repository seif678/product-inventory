<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{

    public function __construct(
        private ProductService $service
    ) {}

    public function index()
    {
        return response()->json($this->service->list());
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->service->create($request->validated());

        return response()->json($product, 201);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $updated = $this->service->update($product, $request->validated());

        return response()->json($updated);
    }

    public function destroy(Product $product)
    {
        $this->service->delete($product);

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}