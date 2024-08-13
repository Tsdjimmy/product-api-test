<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\Actions\UpdateProduct;
use App\Models\Product;
use App\Models\Category;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    protected $updateProduct;

    protected function setUp(): void
    {
        parent::setUp();
        $this->updateProduct = new UpdateProduct();
    }

    /** @test */
    public function it_updates_a_product_successfully()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $data = [
            'name' => 'Updated Product Name',
            'description' => 'Updated description.',
            'price' => 89.99,
            'stock' => 20,
            'category_id' => $category->id,
            'images' => [
                'https://example.com/image3.jpg'
            ],
            'variants' => [
                ['variant_name' => 'Size', 'price' => '1090', 'stock' => '49']
            ]
        ];

        $updatedProduct = $this->updateProduct->execute($product, $data);

        $this->assertInstanceOf(Product::class, $updatedProduct);
        $this->assertEquals($data['name'], $updatedProduct->name);
        $this->assertEquals($data['description'], $updatedProduct->description);
        $this->assertEquals($data['price'], $updatedProduct->price);
        $this->assertEquals($data['stock'], $updatedProduct->stock);
        $this->assertCount(1, $updatedProduct->images);
        $this->assertCount(1, $updatedProduct->variants);
    }
}

