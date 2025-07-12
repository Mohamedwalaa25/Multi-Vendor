<?php
namespace App\Interfaces;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
interface ProductRepositoryInterface
{
    public function getAllProducts(Request $request);
    public function createProduct(array $data);
    public function updateProduct(Product $product, array $data);
    public function deleteProduct(Product $product);
    public function getProductById($id);
    public function getCategories();
    public function uploadImage(Request $request);
}