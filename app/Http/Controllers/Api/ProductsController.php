<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product= Product::filter($request->query())
            ->with('category:id,name', 'store:id,name', 'tags')
            ->paginate();
        return  ProductResource::collection($product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'in:active,inactive',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|gt:price',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category:id,name', 'store:id,name', 'tags')->findOrFail($id);
        if (!$product) {
            return response()->json([
                'Message' => 'Product Not found'
            ], 422);
        } else
            return new ProductResource($product);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',
            'status' => 'in:active,inactive',
            'price' => 'sometimes|required|numeric|min:0',
            'compare_price' => 'nullable|numeric|gt:price',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $product = Product::query()->findOrFail($id)->update($request->all());

        return response()->json($product, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::destroy($id);
        if (!$product) {
            return response()->json([
                'Message' => 'Product Not found'
            ], 422);
        } else
            return response()->json([
                'Message' => 'Product Deleted'
            ], 200);
    }
    }

