<?php

namespace App\Services\Impl;
use  App\Services\AdminServices;
use Illuminate\Support\Facades\Auth;

class AdminServicesImpl implements AdminServices {
    public function login(string $username, string $password):bool
    {
        $loginAttempt = Auth::attempt([
            "username" => $username,
            "password" => $password
        ]);

        if($loginAttempt && Auth::user()->role === "admin"){
            return true;
        }
        return false;
    }

}
