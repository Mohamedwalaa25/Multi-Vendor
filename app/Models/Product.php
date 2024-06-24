<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class,'store_id','id');
    }

    protected static function booted()
    {
//        static::addGlobalScope('store', function (Builder $builder) {
//            $user = Auth::user();
//            if ($user->store_id) {
//                $builder->where('store_id', '=', $user->store_id);
//            }
//        });
        static::addGlobalScope('store', new StoreScope());
    }
}
