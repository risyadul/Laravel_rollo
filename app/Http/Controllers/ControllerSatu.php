<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerSatu extends Controller
{
    public function index()
    {
        return view('Utama/index');
    }
}
