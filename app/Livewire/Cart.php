<?php

namespace App\Livewire;

use Livewire\Component;


class Cart extends Component
{
    public $items;
    public $total;

    public $listeners= ['update-cartDetails'=>"loadCart"];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->items = \App\Facades\cart::get();
        $this->total = \App\Facades\cart::total();
    }

    public function delete_item($id)
    {
        \App\Facades\cart::delete($id);
        $this->loadCart();
        $this->dispatch('updateCartCounter');
        $this->dispatch('all-cart');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
