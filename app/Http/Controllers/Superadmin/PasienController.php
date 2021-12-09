<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Pengguna;
use Session;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        Session::put('title','Data Pasien');
        $pasien = Pasien::all();
        return view ('superadmin/content/pasien/list', compact('pasien'));
    }
    public function add(){
        Session::put('title','');
        return view ('superadmin/content/pasien/add');
    }

    public function store(Request $request){
        $pasien = new Pasien();
        $pasien->name = $request->name;
        $pasien->keluhan = $request->keluhan;
        $pasien->ket = $request->ket;
        try {
            $pasien->save();
            return redirect (route('superadmin.pasien.index'))->with('pesan-berhasil','Anda berhasil menambah data pasien');
        }catch(\Exception $e){
            return redirect (route('superadmin.pasien.index'))->with('pesan-gagal','Anda gagal menambah data pasien');
        }
    }
    public function tambah_user(Request $request){


        $pengguna = new Pengguna();
        $pengguna->name = $request->name;
        $pengguna->role = $request->role;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt('12345678');
        $pengguna->image = $request->image;

        try {
            $pengguna->save();
            return redirect(route('superadmin.pasien.add'))->with('pesan-berhasil','Berhasil membuat akun Pasien');;
        }catch (\Exception $e){
            return redirect(route('superadmin.pasien.add'))->with('pesan-gagal','Gagal membuat akun Pasien');;
        }

    }
    public function edit($id){
        Session::put ('title','Ubah Data pasien');
        $pasien = Pasien::findOrFail($id);
        return view ('superadmin/content/pasien/edit', compact('pasien'));
    }
    public function update(Request $request){
        $pasien = Pasien::findOrFail($request->id);
        $pasien->name = $request->name;
        $pasien->keluhan = $request->keluhan;
        $pasien->ket = $request->ket;
        try {
            $pasien->save();
            return redirect (route('superadmin.pasien.index'))->with('pesan-berhasil','Anda berhasil mengubah data pasien');
        }catch(\Exception $e){
            return redirect (route('superadmin.pasien.index'))->with('pesan-gagal','Anda gagal mengubah data pasien');
        }
    }
    public function delete ($id){
        $pasien = Pasien::findOrFail($id);
        try {
            $pasien->delete();
            return redirect (route('superadmin.pasien.index'))->with('pesan-berhasil','Anda berhasil menghapus data pasien');
        }catch(\Exception $e){
            return redirect (route('superadmin.pasien.index'))->with('pesan-gagal','Anda gagal menghapus data pasien');
        }
    }
}

