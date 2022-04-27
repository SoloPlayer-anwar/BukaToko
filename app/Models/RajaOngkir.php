<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RajaOngkir extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ongkir',
        'photo_ongkir',
        'price_ongkir',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getPhotoOngkirAttribute($value)
    {
        return env('ASSET_URL'). "/uploads/".$value;
    }
}
