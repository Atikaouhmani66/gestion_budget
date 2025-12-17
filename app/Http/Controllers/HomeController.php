<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard'); // fin tu mets ta vue avec le menu
    }
    //
}
