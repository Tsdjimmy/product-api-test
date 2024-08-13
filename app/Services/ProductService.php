<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Actions\CreateProduct;
use App\Services\Actions\UpdateProduct;

class ProductService
{
    protected $createProduct;
    protected $updateProduct;

    public function __construct(CreateProduct $createProduct, UpdateProduct $updateProduct)
    {
        $this->createProduct = $createProduct;
        $this->updateProduct = $updateProduct;
    }

    public function create(array $data)
    {
        return $this->createProduct->execute($data);
    }

    public function update(Product $product, array $data)
    {
        return $this->updateProduct->execute($product, $data);
    }
}
