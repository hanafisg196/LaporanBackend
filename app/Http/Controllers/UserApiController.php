<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
   public function register(UserRegisterRequest $request):JsonResponse

   {
        $data = $request->validated();
        if(User::where('username', $data['username'])->count() == 1){
                throw new HttpResponseException(response([
                    "errors" => [
                        "username" =>[
                            "username already exist"
                        ]
                    ]
                ],400));
        }

        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();
        return(new UserResource($user))->response()->setStatusCode(201);
   }



   public function login(UserLoginRequest $request): UserResource
   {
        $data = $request->validated();
        $user = User::where('username', $data['username'])->first();

        if(!$user || !Hash::check($data['password'], $user->password ))
        {
            throw new HttpResponseException(response([
                "errors" => [
                    "message" =>[
                        "password or username is wrong"
                    ]
                ]
            ],401));
        }
        $user->token = Str::uuid()->toString();
        $user->save();
        return new UserResource($user);
   }


   public function get():UserResource
   {
    //get current user logged
    $user = Auth::user();
    return new UserResource($user);
   }


   public function update(UserUpdateRequest $request): UserResource

   {

    $user = Auth::user();

    //mastiin juga pake id biar lebih aman aja
    if ($user->id != $request->user()->id) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }
    $data = $request->validated();
  /** @var \App\Models\User $user **/
    // Perbarui informasi pengguna
    $user->fill($data);
    $user->save();
    return new UserResource($user);
   }

   public function logout()
   {
    /** @var \App\Models\User $user **/
    $user = Auth::user();
    //set token null
    $user->token = null;
    $user->save();

    return response()->json([
        "data" => true
    ])->setStatusCode(200);

   }
}
