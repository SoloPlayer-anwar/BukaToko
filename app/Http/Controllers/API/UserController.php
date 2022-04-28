<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormmater;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = request(['email', 'password']);

            if(!Auth::attempt($credentials))
            {
                return ResponseFormmater::error([
                    'message' => 'Unauthorized'
                ], 'Unauthorized Failed', 404);
            }

            $user = User::where('email', $request->email)->first();

            if(!Hash::check($request->password, $user->password, []))
            {
                 throw new \Exception('Password is incorrect');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormmater::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Login Success');
        }
        catch(Exception $error)
        {
            return ResponseFormmater::error([
                'message' => 'Login Failed',
                'error' => $error
            ], 'Login Failed', 404);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'address' => '',
                'phone' => '',
                'house_number' => '',
                'latitude' => '',
                'longitude' => '',
                'rt_rw' =>'',
            ]);


            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
                'house_number' => $request->house_number,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'rt_rw' => $request->rt_rw,
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormmater::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Register Success');
        }

        catch(Exception $error)
        {
            return ResponseFormmater::error([
                'message' => 'Register Failed',
                'error' => $error,
            ], 'Register Failed', 404);
        }
    }

    public function getUser(Request $request)
    {
        return ResponseFormmater::success($request->user(), 'Get User Success');
    }

    public function logout(Request $request)
    {
       $token = $request->user()->currentAccessToken()->delete();
       return ResponseFormmater::success($token, 'Logout Success');
    }

    public function updateUser(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();

        $user->update($input);
        return ResponseFormmater::success($user, 'Update User Success');
    }

    public function upload(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();

        if(is_null($user))
        {
            return ResponseFormmater::error([
                'message' => 'User not found'
            ], 'User not found', 404);
        }

        $validate = Validator::make($data, [
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validate->fails())
        {
            return ResponseFormmater::error([
                'message' => 'Validation Failed',
                'error' => $validate->errors()
            ], 'Validation Failed', 404);
        }

        if($request->hasFile('avatar'))
        {
           if($request->file('avatar')->isValid())
           {
               Storage::disk('upload')->delete($user->avatar);
               $avatar = $request->file('avatar');
               $extensions = $avatar->getClientOriginalExtension();
               $userAvatar = "user-avatar/".date('YmdHis').".".$extensions;
               $uploadPath = env('UPLOAD_PATH')."/user-avatar";
               $request->file('avatar')->move($uploadPath, $userAvatar);
               $data['avatar'] = $userAvatar;
           }

        }

        $user->update($data);
        return ResponseFormmater::success(
            $user,
            'Upload Success'
        );

    }


    public function alluser(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 50);
        $role = $request->input('role');
        $show_product = $request->input('show_product');

        if($id)
        {
            $user = User::where(['product'])->find($id);

            if($user)
            {
               return ResponseFormmater::success($user, 'Get User Success');
            }
            else {
                return ResponseFormmater::error([
                    'message' => 'User Not Found'
                ], 'Get User Failed', 404);
            }
        }

        $user = User::query();

        if($role)
        {
            $user->where('role', 'like', '%'.$role.'%');
        }

        if($show_product)
        {
            $user->with('product');
        }

        return ResponseFormmater::success(
            $user->paginate($limit),
            'Get User Success'
        );
    }

}
