<?php

namespace App\Http\Controllers;


class LandingInfoController extends Controller
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
