<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'compare_price',
        'status',
    ];

    protected $appends =[
        'image_url'
    ];

    protected $hidden =[
        'image'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected static function booted()
    {

        static::creating(function (Product $product){
            $product->slug =Str::slug($product->name);
        });
//        static::addGlobalScope('store', function (Builder $builder) {
//            $user = Auth::user();
//            if ($user->store_id) {
//                $builder->where('store_id', '=', $user->store_id);
//            }
//        });
        static::addGlobalScope('store', new StoreScope());
    }

    public function scopeActive($query)
    {
        $query->where('status', '=', 'active');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return "https://www.mobismea.com/upload/iblock/2a0/2f5hleoupzrnz9o3b8elnbv82hxfh4ld/No%20Product%20Image%20Available.png";
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        return asset('storage/'.$this->image);
    }

    public function getSalePercentAttribute()
    {
        if (!$this->compare_price) {
            return 0;
        }
        return round(100 - (100 * $this->price / $this->compare_price), 1);
    }

    public function scopeFilter(Builder $builder , $filters)
    {
        $options =array_merge([
            'store_id'=>null,
            'category_id'=>null,
            'tag_id'=>null,
            'status'=>'active',
        ],$filters);
        $builder->when($options['status'], function($builder, $value) {
            $builder->where('status', $value);
        });
        $builder->when($options['store_id'], function($builder, $value) {
            $builder->where('store_id', $value);
        });
        $builder->when($options['category_id'], function($builder, $value) {
            $builder->where('category_id', $value);
        });
        $builder->when($options['tag_id'], function($builder, $value) {
            $builder->whereHas('tags', function($builder) use ($value) {
                $builder->whereIn('id', $value);
            });
        });
    }


}
