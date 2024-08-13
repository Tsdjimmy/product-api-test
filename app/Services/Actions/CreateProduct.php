<?php

namespace App\Services\Actions;

use App\Models\Product;

class CreateProduct
{
    public function execute(array $data)
    {
        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'price' => $data['price'],
            'stock' => $data['stock'],
            'category_id' => $data['category_id'],
        ]);

        if (isset($data['images'])) {
            foreach ($data['images'] as $imageUrl) {
                $product->images()->create(['image_url' => $imageUrl]);
            }
        }

        if (isset($data['variants'])) {
            foreach ($data['variants'] as $variant) {
                $product->variants()->create($variant);
            }
        }

        return $product;
    }
}

