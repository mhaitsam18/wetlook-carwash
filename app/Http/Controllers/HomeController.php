<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    function index(): View
    {
        return view('home', [
            'title' => 'Beranda'
        ]);
    }
}
