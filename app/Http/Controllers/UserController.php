<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $filterLevel = $request->get('role');
        $data['users'] = User::paginate(5);
        if($filterKeyword)
        {
            $data['users'] = User::where("name","LIKE","%$filterKeyword%")
            ->where('role', $filterLevel)->paginate(5);
        }
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'latitude' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',
            'rt_rw' => 'sometimes|string|max:255',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|max:255',
        ]);

        if($validated->fails())
        {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $input = $request->all();
        if($request->file('avatar')->isValid())
        {
            $avatarFile = $request->file('avatar');
            $extensions = $avatarFile->getClientOriginalExtension();
            $fileName = "user-avatar/".date('YmdHis').".".$extensions;
            $uploadPath = env('UPLOAD_PATH')."/user-avatar";
            $request->file('avatar')->move($uploadPath, $fileName);
            $input['avatar'] = $fileName;
        }

        $input['password'] = Hash::make($request->get('password'));
        User::create($input);
        return redirect()->route('users.index')->with('status', 'Users Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['users'] = User::findOrFail($id);
        return view('users.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['users'] = User::findOrFail($id);
        return view('users.edit', $data);
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
        $dataUser = User::findOrFail($id);
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'latitude' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',
            'rt_rw' => 'sometimes|string|max:255',
            'avatar' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|max:255',
        ]);

        if($validated->fails())
        {
            return redirect()->back()->withErrors($validated);
        }

        $input = $request->all();
        if($request->hasFile('avatar'))
        {
            if($request->file('avatar')->isValid())
            {
                Storage::disk('upload')->delete($dataUser->avatar);
                $avatarFile = $request->file('avatar');
                $extensions = $avatarFile->getClientOriginalExtension();
                $fileName = "user-avatar/".date('YmdHis').".".$extensions;
                $uploadPath = env('UPLOAD_PATH')."/user-avatar";
                $request->file('avatar')->move($uploadPath, $fileName);
                $input['avatar'] = $fileName;
            }
        }

        $dataUser->update($input);
        return redirect()->route('users.index')->with('status', 'Users Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataUser = User::findOrFail($id);
        $dataUser->delete();

        Storage::disk('upload')->delete($dataUser->avatar);
        return redirect()->back()->with('status', 'Users Successfully Deleted');
    }
}
