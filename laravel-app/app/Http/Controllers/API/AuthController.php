<?php 
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SigninRequest;
use App\Http\Requests\User\SignupRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller 
{
    public function signup(SignupRequest $request)
    {

    //1
   //    $request->validate();
        
        //2
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => ($request->password)

        ]);
       return response([
        'message' => 'User registered successfully'
        ], 201);
    }
    public function signin(SigninRequest $request)
    {
      
        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            throw validationException ::withMessages([
                'password' => 'password does not match',
            ]);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
       return response()->json([
        'message' => 'User signed in successfully',
        'user' => $user,
        'token' => $token
        ], 200);
      
    }
    public function signout(Request $request)
    {
        $user = $request->user();//get the authenticated user
        $user->currentAccessToken  ()->delete();//delete the current access token of the authenticated user
        return response([
            'message' => 'User signed out successfully
            '], 200);
    }
    public function verify(Request $request)
    {

        $user = $request->user();
            return response([
                'message' => 'Token is verified',
                'user' => new UserResource($user)
            ], 200);
       
        }
    

}
