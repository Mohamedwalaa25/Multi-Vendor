<?php

namespace App\Facades;

use App\Repositories\Cart\CartModelRepository;
use Illuminate\Support\Facades\Facade;

class cart extends Facade
{
    public static function getFacadeAccessor()
    {
        return CartModelRepository::class;
    }

}
