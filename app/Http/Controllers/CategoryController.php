<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $category['category'] = Category::paginate(10);

        if($filterKeyword)
        {
            $category['category'] = Category::where("name_category", "LIKE", "%$filterKeyword%")->paginate(10);
        }

        return view('category.index', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name_category' => 'required|string|max:255',
            'photo_category' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();

        if($request->file('photo_category')->isValid())
        {
            $photoCategory = $request->file('photo_category');
            $extensions = $photoCategory->getClientOriginalExtension();
            $fileName = "category-photo_category/".date('YmdHis').".".$extensions;
            $uploadPath = env('UPLOAD_PATH'). "/category-photo_category";
            $request->file('photo_category')->move($uploadPath, $fileName);
            $input['photo_category'] = $fileName;
        }

        Category::create($input);
        return redirect()->route('category.index')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category['category'] = Category::findOrFail($id);
        return view('category.edit', $category);
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
        $category = Category::findOrFail($id);
        $validate = Validator::make($request->all(),[
            'name_category' => 'required|string|max:255',
            'photo_category' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        if($request->hasFile('photo_category'))
        {
            if($request->file('photo_category')->isValid())
            {
                $photoCategory = $request->file('photo_category');
                $extensions = $photoCategory->getClientOriginalExtension();
                $fileName = "category-photo_category/".date('YmdHis').".".$extensions;
                $uploadPath = env('UPLOAD_PATH'). "/category-photo_category";
                $request->file('photo_category')->move($uploadPath, $fileName);
                $input['photo_category'] = $fileName;
            }
        }

        $category->update($input);
        return redirect()->route('category.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Storage::disk('upload')->delete($category->photo_category);
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
