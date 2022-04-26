<?php

namespace App\Http\Controllers;

use App\Models\DaftarSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DaftarSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $data['daftar_seller'] = DaftarSeller::paginate(5);

        if($filterKeyword)
        {
            $data['daftar_seller'] = DaftarSeller::where("name_user","LIKE","%$filterKeyword%")
            ->paginate(5);
        }

        return view('daftar_seller.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftarSeller['daftar_seller'] = DaftarSeller::findOrFail($id);
        return view('daftar_seller.detail', $daftarSeller);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daftarSeller['daftar_seller'] = DaftarSeller::findOrFail($id);
        return view('daftar_seller.edit', $daftarSeller);
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
        $daftarSeller = DaftarSeller::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'name_toko' => 'required|string|max:255',
            'name_user' => 'required|string|max:255',
            'photo_ktp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address_seller' => 'required|string|max:255',
            'latitude' => '',
            'longitude' => '',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate);
        }

        $input = $request->all();
        if($request->hasFile('photo_ktp'))
        {
            if($request->file('photo_ktp')->isValid())
            {
                $photoKtp = $request->file('photo_ktp');
                $extensions = $photoKtp->getClientOriginalExtension();
                $fileName = "seller-photo_ktp/".date('YmdHis').".".$extensions;
                $uploadPath = env('UPLOAD_PATH'). "/seller-photo_ktp/";
                $request->file('photo_ktp')->move($uploadPath, $fileName);
                $input['photo_ktp'] = $fileName;
            }
        }

        $daftarSeller->update($input);
        return redirect()->route('daftar_seller.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daftarSeller = DaftarSeller::findOrFail($id);
        $daftarSeller->delete();

        Storage::disk('upload')->delete($daftarSeller->photo_ktp);
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
