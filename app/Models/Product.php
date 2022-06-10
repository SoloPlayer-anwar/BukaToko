<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_product',
        'description_product',
        'rate',
        'price',
        'city',
        'terjual',
        'price_coret',
        'size_satu',
        'size_dua',
        'size_tiga',
        'color_satu',
        'color_dua',
        'color_tiga',
        'image_satu',
        'image_dua',
        'image_tiga',
        'tags',
        'diskon',
        'category_id',
        'gudang_id',
        'user_id',

    ];

    public function komentar ()
    {
        return $this->hasMany(Komentar::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id', 'id');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class , 'gudang_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id', 'id');
    }


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getImageSatuAttribute($value)
    {
        return env('ASSET_URL'). "/uploads/".$value;
    }

    public function getImageDuaAttribute($value)
    {
        return env('ASSET_URL'). "/uploads/".$value;
    }

    public function getImageTigaAttribute($value)
    {
        return env('ASSET_URL'). "/uploads/".$value;
    }
}
