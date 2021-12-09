<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\RekamMedis;
use App\Models\Dokter;


class RekamMedisController extends Controller
{
    public function index(){
        Session::put('title','Data Rekam Medis');
        $rekam_medis = RekamMedis::select("rekam_medis.*",'dokters.nama_dokter')
            ->join('dokters','dokters.id','=','rekam_medis.dokter_id')->orderBy('rekam_medis.id')->get();

        return view ('superadmin/content/rekam_medis/list', compact('rekam_medis'));
    }
    public function add(){
        Session::put('title','Tambah Data Rekam Medis');
        return view ('superadmin/content/rekam_medis/add');
    }

    public function store(Request $request){
        $rekam_medis = new RekamMedis();
        $rekam_medis->nama_dokter = $request->nama_dokter;
        $rekam_medis->spesialis = $request->spesialis;
        try {
            $rekam_medis->save();
            return redirect (route('superadmin.rekam_medis.index'))->with('pesan-berhasil','Anda berhasil menambah data Rekam Medis');
        }catch(\Exception $e){
            return redirect (route('superadmin.rekam_medis.index'))->with('pesan-gagal','Anda gagal menambah data Rekam Medis');
        }
    }
    public function edit($id){
        Session::put ('title','Ubah Data Rekam Medis');
        $rekam_medis = RekamMedis::findOrFail($id);
        return view ('superadmin/content/rekam_medis/edit', compact('rekam_medis'));
    }
    public function update(Request $request){
        $rekam_medis = RekamMedis::findOrFail($request->id);
        $rekam_medis->nama_dokter = $request->nama_dokter;
        $rekam_medis->spesialis = $request->spesialis;
        try {
            $rekam_medis->save();
            return redirect (route('superadmin.rekam_medis.index'))->with('pesan-berhasil','Anda berhasil mengubah data Rekam Medis');
        }catch(\Exception $e){
            return redirect (route('superadmin.rekam_medis.index'))->with('pesan-gagal','Anda gagal mengubah data Rekam Medis');
        }
    }
    public function delete ($id){
        $rekam_medis = RekamMedis::findOrFail($id);
        try {
            $rekam_medis->delete();
            return redirect (route('superadmin.rekam_medis.index'))->with('pesan-berhasil','Anda berhasil menghapus data Rekam Medis');
        }catch(\Exception $e){
            return redirect (route('superadmin.rekam_medis.index'))->with('pesan-gagal','Anda gagal menghapus data Rekam Medis');
        }
    }

}