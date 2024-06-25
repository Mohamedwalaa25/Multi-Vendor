<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::with(['category', 'store'])->paginate(10);

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $tags = implode(",", $product->tags()->pluck('name')->toArray());
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories','tags'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->except('tags'));

        $tags =explode(',', $request->input('tags'));
        $tag_ids = [];
        $save_tag = Tag::all();
        foreach ($tags as $t_name){
            $slug =Str::slug($t_name);
            $tag = $save_tag->where('slug',$slug)->first();
            if(!$tag){
                $tag=Tag::create([
                    'name'=>$t_name,
                    'slug'=>$slug
                ]);
            }
            $tag_ids[] = $tag->id;
        }
        $product->tags()->sync($tag_ids);

        return redirect()->route('products.index')->with('success','Product Update !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
