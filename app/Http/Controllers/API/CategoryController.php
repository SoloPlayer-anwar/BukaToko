<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit',10);
        $name_category = $request->input('name_category');
        $show_product = $request->input('show_product');

        if($id)
        {
            $category = Category::with(['product'])->find($id);

            if($category)
            {
                return ResponseFormmater::success(
                    $category,
                    'Category Berhasil di ambil',
                );

            }
            else {
                return ResponseFormmater::error(
                    null,
                    'Category tidak ditemukan',
                    404
                );
            }
        }

        $category = Category::query();

        if($name_category)
        {
            $category->where('name_category', 'like', '%'.$name_category.'%');
        }

        if($show_product)
        {
            $category->with('product');
        }

        return ResponseFormmater::success(
            $category->paginate($limit),
            'Category Berhasil di ambil',
        );

    }
}
