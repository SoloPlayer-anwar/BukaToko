<?php

namespace App\Http\Controllers;

use App\Models\UploadStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $dataStatus['upload_status'] = UploadStatus::paginate(5);
        if($filterKeyword)
        {
            $dataStatus['upload_status'] = UploadStatus::where("name_user","LIKE","%$filterKeyword%")
            ->paginate(5);
        }

        return view('upload_status.index', $dataStatus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload_status.create');
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
            'name_user' => 'required|string|max:255',
            'desc' => 'required|string',
            'video' => 'required|string|max:255',
            'photo_user' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|string|max:255',

        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        if($request->file('photo_user')->isValid())
        {
            $photoUser = $request->file('photo_user');
            $extensions = $photoUser->getClientOriginalExtension();
            $fileName = "status-photo_user/".date('YmdHis'). ".".$extensions;
            $uploadPath = env('UPLOAD_PATH'). "/status-photo_user";
            $request->file('photo_user')->move($uploadPath, $fileName);
            $input['photo_user'] = $fileName;
        }

        UploadStatus::create($input);
        return redirect()->route('upload_status.index')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataUploadStatus['upload_status'] = UploadStatus::findOrFail($id);
        return view('upload_status.detail', $dataUploadStatus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataUploadStatus['upload_status'] = UploadStatus::findOrFail($id);
        return view('upload_status.edit', $dataUploadStatus);
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
        $dataUploadStatus = UploadStatus::findOrFail($id);
        $validate = Validator::make($request->all(), [
            'name_user' => 'required|string|max:255',
            'desc' => 'required|string',
            'video' => 'required|string|max:255',
            'photo_user' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|string|max:255',

        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $input = $request->all();
        if($request->hasFile('photo_user'))
        {
            if($request->file('photo_user')->isValid())
            {
                $photoUser = $request->file('photo_user');
                $extensions = $photoUser->getClientOriginalExtension();
                $fileName = "status-photo_user/".date('YmdHis'). ".".$extensions;
                $uploadPath = env('UPLOAD_PATH'). "/status-photo_user";
                $request->file('photo_user')->move($uploadPath, $fileName);
                $input['photo_user'] = $fileName;
            }
        }

        $dataUploadStatus->update($input);
        return redirect()->route('upload_status.index')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataUploadStatus = UploadStatus::findOrFail($id);
        $dataUploadStatus->delete();

        Storage::disk('upload')->delete($dataUploadStatus->photo_user);
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
