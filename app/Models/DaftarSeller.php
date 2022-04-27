<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarSeller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_toko',
        'name_user',
        'photo_ktp',
        'address_seller',
        'latitude',
        'longitude',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getPhotoKtpAttribute($value)
    {
        return env('ASSET_URL'). "/uploads/".$value;
    }
}
