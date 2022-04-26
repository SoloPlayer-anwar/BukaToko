<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_gudang',
        'address_gudang',
        'latitude_gudang',
        'longitude_gudang',
        'photo_gudang',
        'status',
        'promo',
    ];


    public function product()
    {
        return $this->hasMany(Product::class, 'gudang_id', 'id');
    }

    public function getCreateAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
