<?php

namespace App\Http\Controllers;

use App\Models\RajaOngkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RajaOngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $data['raja_ongkir'] = RajaOngkir::paginate(5);
        if($filterKeyword)
        {
            $data['raja_ongkir'] = RajaOngkir::where("name_ongkir","LIKE","%$filterKeyword%")
            ->paginate(5);
        }
        return view('raja_ongkir.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('raja_ongkir.create');
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
            'name_ongkir' => 'required|string|max:255',
            'price_ongkir' => 'required|numeric',
            'photo_ongkir' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        if($request->file('photo_ongkir')->isValid())
        {
            $photoOngkir = $request->file('photo_ongkir');
            $extensions = $photoOngkir->getClientOriginalExtension();
            $fileName = "ongkir-photo_ongkir/".date('YmdHis').".".$extensions;
            $uploadPath = env('UPLOAD_PATH'). "/ongkir-photo_ongkir";
            $request->file('photo_ongkir')->move($uploadPath, $fileName);
            $input['photo_ongkir'] = $fileName;
        }

        RajaOngkir::create($input);
        return redirect()->route('raja_ongkir.index')->with('status', 'Data berhasil ditambahkan');
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
        $dataOngkir['raja_ongkir'] = RajaOngkir::findOrFail($id);
        return view('raja_ongkir.edit', $dataOngkir);
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
        $dataOngkir = RajaOngkir::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'name_ongkir' => 'required|string|max:255',
            'price_ongkir' => 'required|numeric',
            'photo_ongkir' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate);
        }

        $input = $request->all();
        if($request->hasFile('photo_ongkir'))
        {
            if($request->file('photo_ongkir')->isValid())
            {
                $photoOngkir = $request->file('photo_ongkir');
                $extensions = $photoOngkir->getClientOriginalExtension();
                $fileName = "ongkir-photo_ongkir/".date('YmdHis'). ".".$extensions;
                $uploadPath = env('UPLOAD_PATH'). "/ongkir-photo_ongkir";
                $request->file('photo_ongkir')->move($uploadPath, $fileName);
                $input['photo_ongkir'] = $fileName;
            }
        }

        $dataOngkir->update($input);
        return redirect()->route('raja_ongkir.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataOngkir = RajaOngkir::findOrFail($id);
        $dataOngkir->delete();

        Storage::disk('upload')->delete($dataOngkir->photo_ongkir);
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
