<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Pengguna;
use App\Models\Pasien;
use App\Models\Transaction;
use App\Models\Dokter;
use Illuminate\Http\Request;
class DashBoardController extends Controller
{
    public function index()
    {
        Session::put('title','Dashboard');
        $admin = Pengguna::all();
        $pasien = Pasien::all();
        $trans = Transaction::all();
        // $dokter = Dokter::all();
        return view('superadmin/content/dashboard', compact('admin', 'pasien', 'trans'));

    }
    public function edit($id){
        Session::put('title','Ubah Profile');
        $data = Pengguna::FindOrfail($id);
        return view('superadmin/content/edit_profile',compact('data'));
    }
    public function update(Request $request){
        $data = Pengguna::FindOrFail($request->id);
        $data ->name = $request->name;
        $data ->role = $request->role;
        $data ->email = $request->email;
        $data ->status = $request->status;
        $data->save();
        return redirect(route('superadmin.dashboard.index'));
    }
}
