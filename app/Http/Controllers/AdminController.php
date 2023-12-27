<?php

namespace App\Http\Controllers;

use App\Services\AdminServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
   private AdminServices $adminServices;

   public function __construct(AdminServices $adminServices)
   {
            $this->adminServices = $adminServices;
   }

   public function Login() :Response
   {
        return response()->view('login.index');
   }

   public function doLogin(Request $request)
   {
        $username = $request->input('username');
        $password = $request->input('password');

        if(empty($username) || empty($password))
        {
            return response()->view("login.index",
            [
                "error" => [
                        "message"=> [
                             "username" => "username is required",
                             "password" => "username is required",
                        ]
                ]
            ]);
        }

        if($this->adminServices->login($username,$password))
        {
            $request->session()->put("admin", $username);
            return redirect('/dashboard');
        }

        return response()->view("login.index",[
            "error" => [
                "username" => "username is wrong",
                "password" => "username is wrong",
            ]
           ]);



   }
}
