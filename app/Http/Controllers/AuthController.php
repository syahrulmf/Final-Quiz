<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function welcome(Request $request)
    {
        // dd($request->all());
        $firstname = $request["firstname"];
        $lastname = $request["lastname"];

        return view('welcome')
            ->with('firstname', $firstname)
            ->with('lastname', $lastname);
        // return "Selamat datang $firstname $lastname";
    }
}
