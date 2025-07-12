<?php
namespace App\Interfaces;
use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAllCategories($request);
    public function createCategory(array $data);
    public function getCategoryById($id);
    public function updateCategory($category, array $data);
    public function deleteCategory($category);
}