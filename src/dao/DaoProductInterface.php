<?php
namespace dao;

use models\Category;
use models\Product;

interface DaoProductInterface
{
    public function createProduct($attributes);

    public function readProductParameters($productCode);

    public function updateProduct($attributes, Category $category);

    public function deleteProduct(Product $product);
}