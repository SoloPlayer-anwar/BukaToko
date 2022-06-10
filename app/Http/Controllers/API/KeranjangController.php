<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function getCart(Request $request)
    {
        $id = $request->input('id');
        $user_id = $request->input('user_id');


        if($id)
        {
            $cart = Keranjang::with(['user'])->find($id);

            if($cart)
            {
                return ResponseFormmater::success(
                    $cart,
                    'Success get cart'
                );
            }

            else {
                return ResponseFormmater::error(
                    null,
                    'Cart not found',
                    404
                );
            }

        }

        $cart =  Keranjang::with(['user'])->where('user_id', Auth::user()->id, Auth::user()->email == Auth::user()->email);

        if($user_id)
        {
            $cart->where('user_id', $user_id);
        }

        return ResponseFormmater::success(
            $cart->get(),
            'Success get cart'
        );
    }

    public function addCart (Request $request)
    {
        $request->validate([
            'name_product' => 'sometimes|string|max:255',
            'varian_product' => 'sometimes|string|max:255',
            'quantity' => 'sometimes|integer',
            'price' => 'sometimes|integer',
            'image' => 'sometimes|string',
            'user_id' => 'required|exists:users,id',
        ]);


        $cart = Keranjang::create([
            'name_product' => $request->name_product,
            'varian_product' => $request->varian_product,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $request->image,
            'user_id' => $request->user_id,
        ]);

        $cart = Keranjang::with(['user'])->find($cart->id);


        try {
            $cart->save();
            return ResponseFormmater::success(
                $cart,
                'Success add cart'
            );
        }

        catch (\Exception $e) {
            return ResponseFormmater::error(
                null,
                $e->getMessage(),
                500
            );
        }
    }


    public function updateCart( Request $request, $id)
    {
        $cart = Keranjang::findOrFail($id);
        $cart->update($request->all());
        return ResponseFormmater::success(
            $cart,
            'Success update cart'
        );
    }


    public function deleteCart(Request $request, $id)
    {
        $cart = Keranjang::findOrFail($id);
        $cart->delete();
        return ResponseFormmater::success(
            null,
            'Success delete cart'
        );
    }
}
