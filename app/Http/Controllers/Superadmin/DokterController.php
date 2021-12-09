<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Dokter;


class DokterController extends Controller
{
    public function index(){
        Session::put('title','Data Dokter');

        $dokter = Dokter::all();
        return view ('superadmin/content/dokter/list', compact('dokter'));
    }
    public function add(){
        Session::put('title','Tambah Data Dokter');
        return view ('superadmin/content/dokter/add');
    }

    public function store(Request $request){
        $dokter = new Dokter();
        $dokter->nama_dokter = $request->nama_dokter;
        try {
            $dokter->save();
            return redirect (route('superadmin.dokter.index'))->with('pesan-berhasil','Anda berhasil menambah data Dokter');
        }catch(\Exception $e){
            return redirect (route('superadmin.dokter.index'))->with('pesan-gagal','Anda gagal menambah data Dokter');
        }
    }
    public function edit($id){
        Session::put ('title','Ubah Data Dokter');
        $dokter = Dokter::findOrFail($id);
        return view ('superadmin/content/dokter/edit', compact('dokter'));
    }
    public function update(Request $request){
        $dokter = Dokter::findOrFail($request->id);
        $dokter->nama_dokter = $request->nama_dokter;
        try {
            $dokter->save();
            return redirect (route('superadmin.dokter.index'))->with('pesan-berhasil','Anda berhasil mengubah data Dokter');
        }catch(\Exception $e){
            return redirect (route('superadmin.dokter.index'))->with('pesan-gagal','Anda gagal mengubah data Dokter');
        }
    }
    public function delete ($id){
        $dokter = Dokter::findOrFail($id);
        try {
            $dokter->delete();
            return redirect (route('superadmin.dokter.index'))->with('pesan-berhasil','Anda berhasil menghapus data Dokter');
        }catch(\Exception $e){
            return redirect (route('superadmin.dokter.index'))->with('pesan-gagal','Anda gagal menghapus data Dokter');
        }
    }

}