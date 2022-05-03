<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit',10);
        $promo = $request->input('promo');
        $show_product = $request->input('show_product');
        $status = $request->input('status');

        if($id)
        {
            $gudang = Gudang::with(['product'])->find($id);

            if($gudang)
            {
                return ResponseFormmater::success(
                    $gudang,
                    'Gudang Berhasil di ambil',
                );

            }
            else {
                return ResponseFormmater::error(
                    null,
                    'Gudang tidak ditemukan',
                    404
                );
            }
        }

        $gudang = Gudang::query();

        if($promo)
        {
            $gudang->where('promo', 'like', '%'.$promo.'%');
        }

        if($show_product)
        {
            $gudang->with('product');
        }

        if($status)
        {
            $gudang->where('status', $status);
        }

        return ResponseFormmater::success(
            $gudang->paginate($limit),
            'Gudang Berhasil di ambil',
        );
    }

}
