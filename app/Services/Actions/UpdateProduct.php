<?php

namespace App\Services\Actions;

use App\Models\Product;

class UpdateProduct
{
    public function execute(Product $product, array $data)
    {
        $product->update([
            'name' => $data['name'] ?? $product->name,
            'description' => $data['description'] ?? $product->description,
            'price' => $data['price'] ?? $product->price,
            'stock' => $data['stock'] ?? $product->stock,
            'category_id' => $data['category_id'] ?? $product->category_id,
        ]);

        if (isset($data['images'])) {
            $product->images()->delete();
            foreach ($data['images'] as $imageUrl) {
                $product->images()->create(['image_url' => $imageUrl]);
            }
        }

        if (isset($data['variants'])) {
            $product->variants()->delete();
            foreach ($data['variants'] as $variant) {
                $product->variants()->create($variant);
            }
        }

        return $product;
    }
}
