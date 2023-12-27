<?php

namespace App\Http\Controllers;

use App\Services\AdminServices;
use Illuminate\Http\RedirectResponse;
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

   public function doLogin(Request $request): Response|RedirectResponse
   {
        $username = $request->input('username');
        $password = $request->input('password');

        if(empty($username) || empty($password))
        {
            return response()->view("login.index",
            [
                "error" => "Username and Password is Required"
            ]);
        }

        if($this->adminServices->login($username,$password))
        {
            $request->session()->put("admin", $username);
            return redirect('/dashboard');
        }

        return response()->view("login.index",[
            "error" => "Username or password not valid"
           ]);



   }


   public function Logout(Request $request): RedirectResponse
   {
    $request->session()->forget('admin');
    return redirect('/');
   }


}
