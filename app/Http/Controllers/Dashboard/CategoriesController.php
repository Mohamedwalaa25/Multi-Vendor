<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryRepository->getAllCategories($request);

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $this->categoryRepository->createCategory($data);
        return redirect()->route('categories.index')->with('success', "Category Created!");
    }

    public function show($id)
    {

        $category = $this->categoryRepository->getCategoryById($id);

        return view('dashboard.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->getCategoryById($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->validated();

        $category = $this->categoryRepository->getCategoryById($id);
        $this->categoryRepository->updateCategory($category, $data);

        return redirect()->route('categories.index')->with('success', "Category Updated!");
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->getCategoryById($id);

        $this->categoryRepository->deleteCategory($category);

        return redirect()->route('categories.index')->with('success', "Category Deleted!");
    }

}