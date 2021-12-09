<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;

class DashBoardController extends Controller
{
    public function index()
    {
        Session::put('title','Dashboard Si Klinik');
        return view('admin/content/dashboard');
    }
}
