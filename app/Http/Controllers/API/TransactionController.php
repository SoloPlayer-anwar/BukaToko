<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function transaction(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 10);
        $product_id = $request->input('product_id');
        $status = $request->input('status');


        if($id)
        {
            $transaction = Transaction::with(['product', 'user'])->find($id);

            if($transaction)
            {
                return ResponseFormmater::success(
                    $transaction,
                    'Success get transaction'
                );
            }

            else {
                return ResponseFormmater::error(
                    null,
                    'Transaction not found',
                    404
                );
            }
        }

        $transaction = Transaction::with(['product', 'user'])->where('user_id', Auth::user()->id, Auth::user()->role == 'admin');

        if($product_id)
        {
            $transaction->where('product_id', $product_id);
        }

        if($status)
        {
            $transaction->where('status', $status);
        }

        return ResponseFormmater::success(
            $transaction->paginate($limit),
            'Success get transaction'
        );
    }


    public function checkout(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'total' => 'required|integer',
            'status' => 'required|string|max:255',
            'varian_product' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => '',
            'longitude' => '',
            'phone' => 'required|string|max:255',
            'pengiriman' => 'required|string|max:255',
            'image_product' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_resi' => 'required|string|max:255',
        ]);


        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'status' => $request->status,
            'payment_url' => '',
            'varian_product' => $request->varian_product,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'phone' => $request->phone,
            'pengiriman' => $request->pengiriman,
            'image_product' => $request->image_product,
            'no_resi' => $request->no_resi,
        ]);

        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $transaction = Transaction::with(['product', 'user'])->find($transaction->id);

        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => (int) $transaction->total,
            ],

            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
                'address' => $transaction->address,
            ],

            'enabled_payments' => [
                'gopay',
                'bank_transfer',
                'shopeepay',
                'indomaret',
                'alfamart',
            ],

            'vtweb' => []
        ];


        try {
            $payment_url = Snap::createTransaction($midtrans)->redirect_url;

            $transaction->payment_url = $payment_url;
            $transaction->save();

            return ResponseFormmater::success(
                $transaction,
                'Transaction Success'
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
}
