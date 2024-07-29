<?php

namespace App\Livewire;

use Livewire\Component;

class Cartcounter extends Component
{
    public $total;
    public $listeners = ['updateCartCounter'=>'getCartItemCount'];

    public function render()
    {
        $this->getCartItemCount();
        return view('livewire.cartcounter');
    }

    public function getCartItemCount()
    {
        $this->total = \App\Facades\cart::get()->count();

    }
}
