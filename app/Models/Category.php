<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable=['name','description','image','parent_id','status','slug'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function scopeActive(Builder $builder)
    {
        $builder->where('categories.status','=','active');
    }
    public function scopeStatus(Builder $builder,$status)
    {
        $builder->where('categories.status','=',$status);
    }
    public function scopeFilter(Builder $builder,$filter)
    {
        $builder->when($filter['name']?? false, function ($builder,$value){
            $builder->where('categories.name', 'LIKE', '%' . $value . '%');

        });
        $builder->when($filter['status']?? false, function ($builder,$value){
            $builder->where('categories.status', 'LIKE', '%' . $value . '%');

        });

    }
}
