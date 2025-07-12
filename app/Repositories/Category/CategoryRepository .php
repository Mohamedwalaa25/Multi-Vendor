<?php

namespace App\Repositories\Category;


use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories($request)
    {
        return Category::withCount('products')->filter($request->all())->paginate(5);
    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function updateCategory($category, array $data)
    {
        return $category->update($data);
    }

    public function deleteCategory($category)
    {
        return $category->delete();
    }
}