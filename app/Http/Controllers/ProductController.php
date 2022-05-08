<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gudang;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $dataProduct['data_product'] = Product::with('category', 'gudang', 'user')->paginate(10);

        if($filterKeyword)
        {
            $dataProduct['data_product'] = Product::with('category', 'gudang', 'user')
            ->where("name_product", "LIKE", "%$filterKeyword%")
            ->paginate(10);
        }

        return view('product.index', $dataProduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $gudang = Gudang::all();
        $user = User::all();
        return view('product.create', compact('category', 'gudang', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name_product' => 'required|string|max:255',
            'description_product' => 'required',
            'rate' => 'required|numeric',
            'price' => 'required|numeric',
            'city' => 'required|string|max:255',
            'terjual' => 'required|numeric',
            'price_coret' => 'required|numeric',
            'size_satu' => 'sometimes|string|max:255',
            'size_dua' => 'sometimes|string|max:255',
            'size_tiga' => 'sometimes|string|max:255',
            'color_satu' => 'sometimes|string|max:255',
            'color_dua' => 'sometimes|string|max:255',
            'color_tiga' => 'sometimes|string|max:255',
            'image_satu' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_dua' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_tiga' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'gudang_id' => 'sometimes|exists:gudangs,id',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        if($validate->failed())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        if($request->file('image_satu')->isValid())
        {
            $photoProduct = $request->file('image_satu');
            $extensions = $photoProduct->getClientOriginalExtension();
            $fileName = "product-photo/" .date('YmdHis'). "." . $extensions;
            $uploadPath = env('UPLOAD_PATH'). "/product-photo";
            $request->file('image_satu')->move($uploadPath, $fileName);
            $input['image_satu'] = $fileName;
        }

        if($request->file('image_dua')->isValid())
        {
            $photoProduct = $request->file('image_dua');
            $extensions = $photoProduct->getClientOriginalExtension();
            $fileName = "product-photo2/" .date('YmdHis'). "." . $extensions;
            $uploadPath = env('UPLOAD_PATH'). "/product-photo2";
            $request->file('image_dua')->move($uploadPath, $fileName);
            $input['image_dua'] = $fileName;
        }

        if($request->file('image_tiga')->isValid())
        {
            $photoProduct = $request->file('image_tiga');
            $extensions = $photoProduct->getClientOriginalExtension();
            $fileName = "product-photo3/" .date('YmdHis'). "." . $extensions;
            $uploadPath = env('UPLOAD_PATH'). "/product-photo3";
            $request->file('image_tiga')->move($uploadPath, $fileName);
            $input['image_tiga'] = $fileName;
        }

        Product::create($input);
        return redirect()->route('product.index')->with('status', 'Data Product Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataProduct['data_product'] = Product::findOrFail($id);
        $dataProduct['category'] = Category::all();
        $dataProduct['gudang'] = Gudang::all();
        $dataProduct['user'] = User::all();

        return view('product.detail', $dataProduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dataProduct['data_product'] = Product::findOrFail($id);
        $dataProduct['category'] = Category::all();
        $dataProduct['gudang'] = Gudang::all();
        $dataProduct['user'] = User::all();
        return view('product.edit', $dataProduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataProduct = Product::with(['category', 'gudang', 'user'])->findOrFail($id);
        $validate = Validator::make($request->all(), [
            'name_product' => 'required|string|max:255',
            'description_product' => 'required',
            'rate' => 'required|numeric',
            'price' => 'required|integer',
            'city' => 'required|string|max:255',
            'terjual' => 'required',
            'price_coret' => 'required|integer',
            'size_satu' => 'sometimes|string|max:255',
            'size_dua' => 'sometimes|string|max:255',
            'size_tiga' => 'sometimes|string|max:255',
            'color_satu' => 'sometimes|string|max:255',
            'color_dua' => 'sometimes|string|max:255',
            'color_tiga' => 'sometimes|string|max:255',
            'image_satu' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_dua' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_tiga' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'gudang_id' => 'sometimes|exists:gudangs,id',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        if($request->hasFile('image_satu'))
        {
            if($request->file('image_satu')->isValid())
            {
                Storage::disk('upload')->delete($dataProduct->image_satu);
                $photoProduct = $request->file('image_satu');
                $extensions = $photoProduct->getClientOriginalExtension();
                $fileName = "product-photo/" .date('YmdHis'). "." . $extensions;
                $uploadPath = env('UPLOAD_PATH'). "/product-photo";
                $request->file('image_satu')->move($uploadPath, $fileName);
                $input['image_satu'] = $fileName;
            }
        }

        if($request->hasFile('image_dua'))
        {
            if($request->file('image_dua')->isValid())
            {
                Storage::disk('upload')->delete($dataProduct->image_dua);
                $photoProduct = $request->file('image_dua');
                $extensions = $photoProduct->getClientOriginalExtension();
                $fileName = "product-photo2/" .date('YmdHis'). "." . $extensions;
                $uploadPath = env('UPLOAD_PATH'). "/product-photo2";
                $request->file('image_dua')->move($uploadPath, $fileName);
                $input['image_dua'] = $fileName;
            }

        }

        if($request->hasFile('image_tiga'))
        {
            if($request->file('image_tiga')->isValid())
            {
                Storage::disk('upload')->delete($dataProduct->image_tiga);
                $photoProduct = $request->file('image_tiga');
                $extensions = $photoProduct->getClientOriginalExtension();
                $fileName = "product-photo3/" .date('YmdHis'). "." . $extensions;
                $uploadPath = env('UPLOAD_PATH'). "/product-photo3";
                $request->file('image_tiga')->move($uploadPath, $fileName);
                $input['image_tiga'] = $fileName;
            }
        }

        $dataProduct->update($input);
        return redirect()->route('product.index')->with('status', 'Data Product Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataProduct = Product::findOrFail($id);
        $dataProduct->delete();
        Storage::disk('upload')->delete($dataProduct->image_satu);
        Storage::disk('upload')->delete($dataProduct->image_dua);
        Storage::disk('upload')->delete($dataProduct->image_tiga);
        return redirect()->back()->with('status', 'Data Product Berhasil Dihapus');
    }
}
