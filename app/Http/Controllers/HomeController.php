<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->session()->get('id')))
            return redirect('login');

        return view('home', ['name' => $request->session()->get('name')]);
    }
}
