<?php

namespace App\Livewire;
use App\Facades\cart;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $query = '';
    public $range = 10000;



    public function updating($propertyName)
    {
        if (in_array($propertyName, ['query', 'range'])) {
            $this->resetPage();
        }
    }

    public function search()
    {
        // Trigger a re-render by updating a property or calling a method
        $this->query = $this->query; // Or any other property update
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->query . '%')
            ->where('price', '<=', $this->range)->latest()
            ->paginate(9);

        $categories = Category::withCount('products')->get();
        return view('livewire.product-search', ['products' => $products,
            'categories'=>$categories]);
    }
    public function addToCart($id)
    {
        Cart::add($id);
        $this->dispatch('update-cartDetails');
        $this->dispatch('flash-message');


    }
}
