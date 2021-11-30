<?php

namespace App\Http\Controllers\Superadmin;

use App\Exports\DataPengguna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index(){
        // untuk list admin
        Session::put('title','Data Admin');

        $pengguna = Pengguna::all();

        return view('superadmin/content/pengguna/list',compact('pengguna'));
    }

    public function add(){
        // menampilkan form tambah
        Session::put('title','Tambah Data Admin');
        return view('superadmin/content/pengguna/add');
    }

    public function store(Request $request){
        //upload file
        //1.store file to storage 2.getHasNameFromFile (DB)
        $request->file('image')->store('public');
        $nameImage = $request->file('image')->hashName();

        $pengguna = new pengguna();
        $pengguna->name = $request->name;
        $pengguna->role = $request->role;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt('12345678');
        $pengguna->image = $nameImage;

        try {
            $pengguna->save();
            //pesan sukses
            //redirect
            return redirect(route('superadmin.pengguna.index'))->with('pesan-berhasil','Berhasil menambah data pengguna');;
        }catch (\Exception $e){
            //pesan tidak sukses
            //redirect
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal','Gagal menambah data pengguna');;
        }

    }

    public function edit($id){
        //menampilkan form ubah
        Session::put('title','Ubah Data Admin');
        $pengguna = Pengguna::FindOrfail($id);
        return view('superadmin/content/pengguna/edit',compact('pengguna'));
    }
    public function update(Request $request){
        $pengguna = Pengguna::FindOrFail($request->id);
        $pengguna ->name = $request->name;
        $pengguna ->role = $request->role;
        $pengguna ->email = $request->email;
        $pengguna ->status = $request->status;

        try {
            $pengguna->save();
            //pesan sukses
            //redirect
            return redirect(route('superadmin.pengguna.index'))->with('pesan-berhasil','Berhasil mengubah data pengguna');
        }catch (\Exception $e) {
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal','Gagal mengubah data pengguna');
        }
    }

    public function delete($id){
        // pastikan ada data
        $pengguna = Pengguna::FindOrfail($id);
        try {
            $pengguna->delete();
            return redirect(route('superadmin.pengguna.index'))->with('pesan-berhasil','Berhasil menghapus data pengguna');;
        }catch (\Exception $e) {
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal', 'Gagal menghapus data pengguna');;
        }
    }
    public function export(){
        return Excel::download(new DataPengguna(), 'pengguna.xlsx');
    }
}
