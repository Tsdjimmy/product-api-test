<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\Actions\CreateProduct;
use App\Models\Product;
use App\Models\Category;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    protected $createProduct;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createProduct = new CreateProduct();
    }

    /** @test */
    public function it_creates_a_product_successfully()
    {
        $category = Category::factory()->create();

        $data = [
            'name' => 'New Product',
            'description' => 'Product description.',
            'price' => 99.99,
            'stock' => 50,
            'category_id' => $category->id,
            'images' => [
                'https://example.com/image1.jpg',
                'https://example.com/image2.jpg'
            ],
            'variants' => [
                ['variant_name' => 'Size', 'price' => '1090', 'stock' => '49']
            ],
        ];

        $product = $this->createProduct->execute($data);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($data['name'], $product->name);
        $this->assertEquals($data['description'], $product->description);
        $this->assertCount(2, $product->images);
        $this->assertCount(1, $product->variants);
    }
}

