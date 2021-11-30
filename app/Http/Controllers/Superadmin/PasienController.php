<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
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
        Session::put('title','Tambah Data Pasien');

        return view ('superadmin/content/pasien/add');
    }

    public function store(Request $request){
        $pasien = new Pasien();
        $pasien->name = $request->name;
        try {
            $pasien->save();
            return redirect (route('superadmin.pasien.index'))->with('pesan-berhasil','Anda berhasil menambah data pasien');
        }catch(\Exception $e){
            return redirect (route('superadmin.pasien.index'))->with('pesan-gagal','Anda gagal menambah data pasien');
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

