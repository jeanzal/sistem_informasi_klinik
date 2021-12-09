<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Session;

class DashBoardController extends Controller
{
    public function index()
    {
        Session::put('title','Dashboard Pasien');
        return view('user/content/dashboard');
    }
}
