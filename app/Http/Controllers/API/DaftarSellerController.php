<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\DaftarSeller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class DaftarSellerController extends Controller
{
    public function daftarSeller(Request $request)
    {
        $request->validate([
            'name_toko' => 'required|string|max:255',
            'name_user' => 'required|string|max:255',
            'photo_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address_seller' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $daftarSeller = DaftarSeller::create([
            'name_toko' => $request->name_toko,
            'name_user' => $request->name_user,
            'photo_ktp' => $request->photo_ktp,
            'address_seller' => $request->address_seller,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        if($request->file('photo_ktp')->isValid())
        {
            $photoKtp = $request->file('photo_ktp');
            $extensions = $photoKtp->getClientOriginalExtension();
            $photoSeller = "seller-photo_ktp/".date('YmdHis').".".$extensions;
            $uploadPath = env('UPLOAD_PATH')."/seller-photo_ktp";
            $request->file('photo_ktp')->move($uploadPath, $photoSeller);
            $daftarSeller['photo_ktp'] = $photoSeller;
        }

        try {
            $daftarSeller->save();

            return ResponseFormmater::success(
                $daftarSeller,
                'Daftar Seller berhasil ditambahkan'
            );
        }
        catch (Exception $error)
        {
            return ResponseFormmater::error(
                $error->getMessage(),
                'Daftar Seller gagal ditambahkan'
            );
        }

    }

}
