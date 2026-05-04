<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_product()
    {
        $response = $this->postJson('/api/products', [
            'sku' => 'P001',
            'name' => 'Laptop',
            'price' => 1000,
            'stock_quantity' => 10,
            'status' => 'active'
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'sku',
                'name',
                'price'
            ]);
    }


    public function test_can_list_products()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200);
    }

    public function test_can_get_single_product()
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/products/{$product->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $product->id
            ]);
    }

    public function test_can_update_product()
    {
        $product = Product::factory()->create();

        $response = $this->putJson("/api/products/{$product->id}", [
            'name' => 'Updated Name'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Updated Name'
            ]);
    }


    public function test_can_delete_product()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->id}");

        $response->assertStatus(200);

        $this->assertSoftDeleted('products', [
            'id' => $product->id
        ]);
    }


    public function test_can_get_low_stock_products()
    {
        Product::factory()->create([
            'stock_quantity' => 2,
            'low_stock_threshold' => 5
        ]);

        $response = $this->getJson('/api/products/low-stock');

        $response->assertStatus(200);
    }


    public function test_can_increase_stock()
    {
        $product = Product::factory()->create([
            'stock_quantity' => 5
        ]);

        $response = $this->postJson("/api/products/{$product->id}/stock", [
            'type' => 'increment',
            'quantity' => 3
        ]);

        $response->assertStatus(200);
    }
}
