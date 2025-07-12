<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts(Request $request)
    {
        return Product::with(['category'])->filter($request->all())->paginate(10);
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct(Product $product, array $data)
    {
        return $product->update($data);
    }

    public function deleteProduct(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        return $product->delete();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function getCategories()
    {
        return Category::select('id', 'title')->get();
    }

    public function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return null;
        }
        $file = $request->file('image');
        $path = $file->store('Products', 'public');
        return $path;
    }
}