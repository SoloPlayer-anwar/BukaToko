<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $filterKeyword = $request->get('keyword');
        $dataKomentar['komentar'] = Komentar::paginate(10);

        if($filterKeyword)
        {
            $dataKomentar = Komentar::where("name_komentar","LIKE","%$filterKeyword%")
            ->paginate(10);
        }

        return view('komentar.index', $dataKomentar);
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
        $dataKomentar['komentar'] = Komentar::findOrFail($id);
        return view('komentar.detail', $dataKomentar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataKomentar['komentar'] = Komentar::findOrFail($id);
        return view('komentar.edit', $dataKomentar);
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
        $dataKomentar = Komentar::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'comment_admin' => 'required|string|max:255',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $dataKomentar->update($request->all());
        return redirect()->route('komentar.index')->with('status', 'Data Komentar Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataKomentar = Komentar::findOrFail($id);
        $dataKomentar->delete();
        return redirect()->back()->with('status', 'Data Komentar Berhasil Dihapus');
    }
}
