<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_products_route_return_ok(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_user_can_see_create_product_link(): void
    {
        $response = $this->get('/products');

        $response->assertSee('Create Product');
    }

    public function test_it_shows_product_names_on_index_page(): void
    {
        $products = Product::factory(3)->create();

        $response = $this->get('/products');

        $response->assertStatus(200);

        foreach ($products as $product) {
            // Adjust the expected text based on the ProductObserver modification
            $expectedText = preg_replace('/\s[^ ]+$/', '', $product->name);

            $response->assertSee($expectedText);
        }
    }

    public function test_show_product_price_whit_dollar_sign(): void
    {
        $products = Product::factory(3)->create();

        $response = $this->get('/products');

        foreach ($products as $product) {
            $response->assertSee('$');
            $response->assertSee($product->price);

        }
    }

    public function test_creating_product_slug(): void
    {
        $product = Product::create([
            'name' => 'Product name',
            'price' => '12',
            'quantity' => 3,
        ]);

        $response = $this->get('/products');

        $response->assertSee('Slug: product-name');

    }

}
