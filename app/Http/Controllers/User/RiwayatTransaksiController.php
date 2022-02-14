<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\Transaction;
use App\Models\Item;
use App\Models\ItemRM;
use App\Models\Pasien;
use App\Models\Pengguna;
use App\Models\RekamMedis;
use App\Models\Pembayaran;
use App\Models\Dokter;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;


class RiwayatTransaksiController extends Controller
{
    public function index()
    {    
        Session::put('title','Riwayat Transaksi');
        $id = Auth::guard('user')->user()->name;
        $riwayat = Transaction::select('transactions.*','pasien.name','admins.name as pengguna_name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->where('pasien.name', $id)
            ->get();
        
        return view('user/content/riwayat/riwayatTransaksi',compact('riwayat'));
    }
    public function print($id){

        $transaction = Transaction::select('transactions.*','pasien.name','admins.name as pengguna_name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->where('transactions.id',$id)
            ->first();


        $item = Item::select('items.*','products.name as product_name','products.price as product_price')
            ->join('transactions','transactions.id','=','items.transaction_id')
            ->join('products','products.id','=','items.product_id')
            ->where('transactions.id',$id)
            ->get();

        $html= view ('user/content/riwayat/print', compact('transaction','item'));
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->output();
    }
    public function printRM($id){

        $transaction = Transaction::select('transactions.*','pasien.name','admins.name as pengguna_name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->where('transactions.id',$id)
            ->first();

        $item = ItemRM::select('item_rm.*','rekam_medis.spesialis','rekam_medis.biaya','dokters.nama_dokter')
            ->join('transactions','transactions.id','=','item_rm.transaction_id')
            ->join('rekam_medis','rekam_medis.id','=','item_rm.rekam_medis_id')
            ->join('dokters','dokters.id','=','rekam_medis.dokter_id')
            ->where('transactions.id',$id)
            ->get();

        $html= view ('user/content/riwayat/printRM', compact('transaction','item'));
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->output();
    }

    public function detail($id){
        Session::put('title','');
        $transaction = Transaction::select('transactions.*','pasien.name','admins.name as pengguna_name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->where('transactions.id',$id)
            ->first();
        $item = Item::select('items.*','products.name as product_name','products.price as product_price')
         ->join('transactions','transactions.id','=','items.transaction_id')
         ->join('products','products.id','=','items.product_id')
         ->where('transactions.id',$id)
         ->get();

         return view ('user/content/riwayat/detail', compact('transaction','item'));
    }
    public function detailRM($id){
        Session::put('title','');
        $transaction = Transaction::select('transactions.*','pasien.name','admins.name as pengguna_name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->where('transactions.id',$id)
            ->first();
        $item = ItemRM::select('item_rm.*','rekam_medis.spesialis','rekam_medis.biaya','dokters.nama_dokter')
         ->join('transactions','transactions.id','=','item_rm.transaction_id')
         ->join('rekam_medis','rekam_medis.id','=','item_rm.rekam_medis_id')
         ->join('dokters','dokters.id','=','rekam_medis.dokter_id')
         ->where('transactions.id',$id)
         ->get();

         return view ('user/content/riwayat/detailRM', compact('transaction','item'));
    }
}