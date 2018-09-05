<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.landing');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function portafolio()
    {
        return view('pages.portafolio');
    }
}
