<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomelabController extends Controller
{
    public function index()
    {
        return view('homelab.index');
    }
}
