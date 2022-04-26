<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\RajaOngkir;
use Illuminate\Http\Request;

class RajaOngkirController extends Controller
{
    public function ongkir(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 10);

        if($id)
        {
            $ongkir = RajaOngkir::find($id);

            if($ongkir)
            {
                return ResponseFormmater::success(
                    $ongkir,
                    'Data ongkir berhasil diambil'
                );
            }

            else {
                return ResponseFormmater::error(
                    null,
                    'Data ongkir tidak ditemukan',
                );
            }
        }

        $ongkir = RajaOngkir::query();

        return ResponseFormmater::success(
            $ongkir->paginate($limit),
            'Data ongkir berhasil diambil'
        );
    }
}
