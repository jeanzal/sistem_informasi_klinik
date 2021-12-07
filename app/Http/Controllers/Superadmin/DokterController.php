<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
// use App\Models\Doktor;


class DokterController extends Controller
{
    public function index(){
        Session::put('title','Data Doktor');
        return view ('superadmin/content/dokter/list');
    }

}