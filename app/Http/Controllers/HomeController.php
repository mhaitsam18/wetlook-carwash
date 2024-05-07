<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    function index(): View
    {
        return view('home.index', [
            'title' => 'Beranda'
        ]);
    }

    function booking(): View
    {
        return view('home.booking', [
            'title' => 'Booking',
            'packages' => Package::all(),
            'vehicles' => Vehicle::all()
        ]);
    }
}
