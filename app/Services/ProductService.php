<?php

namespace App\Services;

use App\Repositories\ProductRepositoryInterface;
use App\Models\Product;

class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $repo
    ) {}

    public function list()
    {
        return $this->repo->all();
    }

    public function find(string $id)
    {
        return $this->repo->find($id);
    }

    public function create(array $data): Product
    {
        return $this->repo->create($data);
    }

    public function update(Product $product, array $data): Product
    {
        return $this->repo->update($product, $data);
    }

    public function delete(Product $product): bool
    {
        return $this->repo->delete($product);
    }
}