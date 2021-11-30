<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){
        Session::put('title','Data Kategori');
        $kategori = Category::all();
        return view ('superadmin/content/kategori/list', compact('kategori'));
    }
    public function add(){
        Session::put('title','Tambah Data Kategori');

        return view ('superadmin/content/kategori/add');
    }

    public function store(Request $request){
        $kategori = new Category();
        $kategori->name = $request->name;
        try {
            $kategori->save();
            return redirect (route('superadmin.kategori.index'))->with('pesan-berhasil','Anda berhasil menambah data kategori');
        }catch(\Exception $e){
            return redirect (route('superadmin.kategori.index'))->with('pesan-gagal','Anda gagal menambah data kategori');
        }
    }
    public function edit($id){
        Session::put ('title','Ubah Data Kategori');
        $kategori = Category::findOrFail($id);
        return view ('superadmin/content/kategori/edit', compact('kategori'));
    }
    public function update(Request $request){
        $kategori = Category::findOrFail($request->id);
        $kategori->name = $request->name;
        try {
            $kategori->save();
            return redirect (route('superadmin.kategori.index'))->with('pesan-berhasil','Anda berhasil mengubah data kategori');
        }catch(\Exception $e){
            return redirect (route('superadmin.kategori.index'))->with('pesan-gagal','Anda gagal mengubah data kategori');
        }
    }
    public function delete ($id){
        $kategori = Category::findOrFail($id);
        try {
            $kategori->delete();
            return redirect (route('superadmin.kategori.index'))->with('pesan-berhasil','Anda berhasil menghapus data kategori');
        }catch(\Exception $e){
            return redirect (route('superadmin.kategori.index'))->with('pesan-gagal','Anda gagal menghapus data kategori');
        }
    }
}
