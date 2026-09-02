<?php 
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller 
{
    public function signup(Request $request)
    {

    //1
       $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:10|confirmed'
        ]);
        //2
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
       return response()->json(['message' => 'User registered successfully'], 201);
    }
    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|max:10|'
        ]);
        $user = User::where('email', $request->email)->first();
        
        //model //null 
        return response([
            'message' => 'User signed in successfully'
        ],200);
    }
}
