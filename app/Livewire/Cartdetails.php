<?php

namespace App\Livewire;

use Livewire\Component;
use App\Facades\Cart;

class Cartdetails extends Component
{
    public $cart;
    public $total;
    protected $listeners = ['total-number' => 'totalnumber',
        'all-cart' => 'allcart',
    ];

    public function mount()
    {
        $this->cart = cart::get();
        $this->total = cart::total();
    }

    public function delete_item($id)
    {
        \App\Facades\cart::delete($id);
        $this->dispatch('update-cartDetails');
        $this->totalnumber();
        notify()->info('Delete Product Successfully', 'Success');

    }

    public function allcart()
    {
        $this->cart = cart::get();
    }

    public function render()
    {
        return view('livewire.cartdetails');
    }

    public function totalnumber()
    {
        $this->total = cart::total();
    }

    public function incrementQty($id)
    {
        $cart = \App\Models\Cart::find($id);
        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
            $this->cart = cart::get(); // Update the cart property
            $this->totalnumber(); // Update the total property
            notify()->info('Increment Quantity Successfully', 'Success');
        }
    }

    public function decrementQty($id)
    {
        $cart = \App\Models\Cart::find($id);
        if ($cart && $cart->quantity > 1) {
            $cart->quantity -= 1;
            $cart->save();
            $this->cart = cart::get(); // Update the cart property
            $this->totalnumber(); // Update the total property
            notify()->info('Decrement Quantity Successfully', 'Success');

        } else {
            notify()->error("You Can't Decrement More", 'Error');
        }
    }
}
