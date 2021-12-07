<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
// use App\Models\Pembayaran;


class PembayaranController extends Controller
{
    public function index(){
        Session::put('title','Data Pembayaran');
        return view ('superadmin/content/pembayaran/list');
    }

}