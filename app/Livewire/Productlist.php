<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Facades\Cart;

class Productlist extends Component
{
    public $products;
    public $listeners= ['flash-message'=>'flashmessage'];
    public function mount()
    {
        $this->products = Product::query()->where('featured', '=', '2')->take(8)->get();
    }

    public function render()
    {
        return view('livewire.productlist');
    }

    public function addToCart($id)
    {
        Cart::add($id);
        $this->dispatch('update-cartDetails');
        $this->dispatch('flash-message');


    }

    public function flashmessage()
    {
        notify()->info('Add Product Successfully', 'Success');
    }
}
