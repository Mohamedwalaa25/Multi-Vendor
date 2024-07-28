<?php

namespace App\Livewire;

use Livewire\Component;
use App\Facades\Cart;

class Cartdetails extends Component
{
    public $cart;
    public $total;
    protected $listeners = ['total-number' => 'totalnumber'];

    public function mount($cart)
    {
        $this->cart = cart::get();
        $this->total = cart::total();


    }

    public function delete_item($id)
    {
        \App\Facades\cart::delete($id);
        $this->dispatch('updateCartCount');
        $this->dispatch('total-number');
    }

    public function increase_quantity($id_cartitem)
    {

        $cart_item = \App\Models\Cart::find($id_cartitem);
        $quantity = $cart_item->quantity;

        $cart_item->update([
            'quantity' => $quantity + 1,

        ]);
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
        $cart = Cart::whereId($id)->first();
        $cart->quantity += 1;
        $cart->save();

        session()->flash('success', 'Product quantity updated !!!');
    }

    public function decrementQty($id)
    {
        $cart = Cart::whereId($id)->first();
        if ($cart->quantity > 1) {
            $cart->quantity -= 1;
            $cart->save();
            session()->flash('success', 'Product quantity updated !!!');
        } else {
            session()->flash('info', 'You cannot have less than 1 quantity');
        }
    }
}
