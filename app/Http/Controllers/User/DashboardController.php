<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use App\Models\Pengguna;
use App\Models\Pasien;
use App\Models\Transaction;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        Session::put('title','Dashboard Pasien');
        $id = Auth::guard('user')->user()->name;
        $trans = Transaction::select('transactions.*','pasien.name','admins.name as pengguna_name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->where('pasien.name', $id)
            ->get();
        return view('user/content/dashboard',compact('trans'));
    }
}
