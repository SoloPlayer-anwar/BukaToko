<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filterKeyword = request()->get('keyword');
        $dataGudang['data_gudang'] = Gudang::paginate(5);

        if($filterKeyword)
        {
            $dataGudang['data_gudang'] = Gudang::where("name_gudang","LIKE","%$filterKeyword%")
            ->paginate(5);
        }

        return view('gudang.index', $dataGudang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name_gudang' => 'required|string|max:255',
            'address_gudang' => 'required|string|max:255',
            'photo_gudang' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude_gudang' => '',
            'longitude_gudang' => '',
            'status' => 'required|string|max:255',
            'promo' => 'required|string|max:255',
        ]);

        if($validate->failed())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();

        if($request->file('photo_gudang')->isValid())
        {
            $photoGudang = $request->file('photo_gudang');
            $extensions = $photoGudang->getClientOriginalExtension();
            $fileName = "gudang-photo_gudang/".date('YmdHis').".".$extensions;
            $uploadPath = env('UPLOAD_PATH'). "/gudang-photo_gudang";
            $request->file('photo_gudang')->move($uploadPath, $fileName);
            $input['photo_gudang'] = $fileName;
        }

        Gudang::create($input);
        return redirect()->route('gudang.index')->with('status', 'Data Gudang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataGudang['data_gudang'] = Gudang::findOrFail($id);
        return view('gudang.detail', $dataGudang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataGudang['data_gudang'] = Gudang::findOrFail($id);
        return view('gudang.edit', $dataGudang);
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
        $dataGudang = Gudang::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'name_gudang' => 'required|string|max:255',
            'address_gudang' => 'required|string|max:255',
            'photo_gudang' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude_gudang' => '',
            'longitude_gudang' => '',
            'status' => 'required|string|max:255',
            'promo' => 'required|string|max:255',
        ]);

        if($validate->failed())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        if($request->hasFile('photo_gudang'))
        {
            if($request->file('photo_gudang')->isValid())
            {
                $photoGudang = $request->file('photo_gudang');
                $extensions = $photoGudang->getClientOriginalExtension();
                $fileName = "gudang-photo_gudang/".date('YmdHis').".".$extensions;
                $uploadPath = env('UPLOAD_PATH'). "/gudang-photo_gudang";
                $request->file('photo_gudang')->move($uploadPath, $fileName);
                $input['photo_gudang'] = $fileName;
            }
        }

        $dataGudang->update($input);
        return redirect()->route('gudang.index')->with('status', 'Data Gudang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataGudang = Gudang::findOrFail($id);
        $dataGudang->delete();

        Storage::disk('upload')->delete($dataGudang->photo_gudang);
        return redirect()->back()->with('status', 'Data Gudang Berhasil Dihapus');
    }
}
