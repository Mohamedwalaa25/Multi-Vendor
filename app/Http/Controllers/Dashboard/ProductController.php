<?php

namespace App\Http\Controllers\Dashboard\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProducttRequest;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $products = $this->productRepository->getAllProducts($request);

        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->productRepository->getCategories();

        return view('dashboard.products.create', compact('categories'));
    }

    public function store(ProducttRequest $request)
    {
        $request->validated();

        $data = $request->except('image');
        $data['image'] = $this->productRepository->uploadImage($request);

        $this->productRepository->createProduct($data);
        return redirect()->route('products.index')->with('success', "Product Created !");
    }

    public function show($id)
    {

        $product = $this->productRepository->getProductById($id);

        return view('dashboard.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->getProductById($id);
        $categories = $this->productRepository->getCategories();

        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(ProducttRequest $request, $id)
    {
        $request->validated();

        $product = $this->productRepository->getProductById($id);

        $old_image = $product->image;
        $data = $request->except('image');

        $new_image = $this->productRepository->uploadImage($request);

        if ($new_image) {
            $data['image'] = $new_image;
        }

        $this->productRepository->updateProduct($product, $data);

        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('products.index')->with('success', 'Product Updated !');
    }

    public function destroy($id)
    {
        $product = $this->productRepository->getProductById($id);

        $this->productRepository->deleteProduct($product);
        return redirect()->route('products.index')->with('success', 'Product Deleted !');
    }
}