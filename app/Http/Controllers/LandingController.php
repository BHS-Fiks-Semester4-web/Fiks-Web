<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function home()
    {
        return view('home');
    }

    public function product()
    {
        return view('product');
    }

    public function contact()
    {
        return view('contact');
    }
}
