<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ResponseTrait;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->original_password = $request->password;

        $role = Role::where('name', 'staff')->first();
        $user->role_id = $role->id;
        $user->save();
        $user->assignRole($role->name);

        return $this->successResponse(200, 'User Register Successfully', '');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse(401, $validator->errors(), '');
        }

        $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (!$user) {
            return $this->errorResponse(405, 'Invalid login or password', '');
        }
        $user = Auth::user();
        $token = $user->createToken($user)->plainTextToken;

        return $this->successResponse(200, 'User Login Successfully', $token);
    }

    public function getProfile(Request $request)
    {
        
        $user = Auth::user();
       
        if (!$user) {

            return $this->errorResponse(405, 'User not found', '');
        }
        
        return $this->successResponse(200, 'User getProfile Successfully', $user);
    }
}
