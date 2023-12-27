<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(Request $request)
    {
        if($request->session()->exists("admin"))
        {
            return redirect('/dashboard');
        }
        else
        {
            return redirect('/login');
        }
    }
}
