<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\ResponseService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    protected $productService;
    protected $responseService;

    public function __construct(ProductService $productService, ResponseService $responseService)
    {
        $this->productService = $productService;
        $this->responseService = $responseService;
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        $product = $this->productService->create($data);
        return $this->responseService->success($product, 'Product created successfully.');
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->all();
        $updatedProduct = $this->productService->update($product, $data);
        return $this->responseService->success($updatedProduct, 'Product updated successfully.');
    }
}
