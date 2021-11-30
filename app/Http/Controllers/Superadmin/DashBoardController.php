<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use Session;
class DashBoardController extends Controller
{
    public function index()
    {
        Session::put('title','Dashboard');
       return view('superadmin/content/dashboard');

    }
}
