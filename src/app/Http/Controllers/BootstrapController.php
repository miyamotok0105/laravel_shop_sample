<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BootstrapController extends Controller
{
    public function index()
    {
        return view('bootstrap');
    }

    public function container()
    {
        return view('bootstrap.container');
    }

    public function grid()
    {
        return view('bootstrap.grid');
    }

}
