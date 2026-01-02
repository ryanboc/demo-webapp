<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServerAutomationController extends Controller
{
    public function index()
    {
        return view('serverautomation.index');
    }
}
