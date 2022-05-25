<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 10);
        $name_product = $request->input('name_product');
        $tags = $request->input('tags');
        $category_id = $request->input('category_id');
        $gudang_id = $request->input('gudang_id');
        $user_id = $request->input('user_id');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');


        if($id)
        {
            $product = Product::with(['category', 'gudang', 'user'])->find($id);

            if($product)
            {
                return ResponseFormmater::success(
                    $product,
                    'Product berhasil diambil'
                );
            }

            else {
                return ResponseFormmater::error(
                    null,
                    'Product tidak ditemukan',
                    404,
                );
            }
        }

        $product = Product::with(['category', 'gudang', 'user']);

        if($name_product)
        {
            $product->where('name_product', 'like', '%' . $name_product . '%');
        }

        if($tags)
        {
            $product->where('tags', 'like', '%' . $tags . '%');
        }

        if($price_from)
        {
            $product->where('price', '>=', $price_from);
        }

        if($price_to)
        {
            $product->where('price', '<=', $price_to);
        }

        if($category_id)
        {
            $product->where('category_id', $category_id);
        }

        if($gudang_id)
        {
            $product->where('gudang_id', $gudang_id);
        }

        if($user_id)
        {
            $product->where('user_id', $user_id);
        }

        return ResponseFormmater::success(
            $product->paginate($limit),
            'Product berhasil diambil'
        );
    }
}
