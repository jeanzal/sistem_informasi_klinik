<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use App\Models\Transaction;
use App\Models\Item;
use App\Models\ItemRM;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;


class TransactionController extends Controller
{

    public function index(){
        Session::put('title','Data Transaksi');
        $transaction = Transaction::select('transactions.*','pasien.name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')->get();
        return view('superadmin/content/transaction/list', compact('transaction'));
    }


    public function detail($id){
        Session::put('title','');
        $transaction = Transaction::select('transactions.*','pasien.name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->where('transactions.id',$id)
            ->first();
        $item = Item::select('items.*','products.name as product_name','products.price as product_price')
         ->join('transactions','transactions.id','=','items.transaction_id')
         ->join('products','products.id','=','items.product_id')
         ->where('transactions.id',$id)
         ->get();

         return view ('superadmin/content/transaction/detail', compact('transaction','item'));
    }
    public function detailRM($id){
        Session::put('title','');
        $transaction = Transaction::select('transactions.*','pasien.name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->where('transactions.id',$id)
            ->first();
        $item = ItemRM::select('item_rm.*','rekam_medis.spesialis','rekam_medis.biaya')
         ->join('transactions','transactions.id','=','item_rm.transaction_id')
         ->join('rekam_medis','rekam_medis.id','=','item_rm.rekam_medis_id')
         ->where('transactions.id',$id)
         ->get();

         return view ('superadmin/content/transaction/detailRM', compact('transaction','item'));
    }
    public function add(){
        Session::put('title','Tambah Transaksi Membeli Obat');
        $product = Product::all();
        $pasien = Pasien::all();
        return view ('superadmin/content/transaction/add', compact('product','pasien'));

    }
    public function addRM(){
        Session::put('title','Tambah Transaksi Rekam Medis');
        $rekam_medis = RekamMedis::all();
        $pasien = Pasien::all();
        return view ('superadmin/content/transaction/addRM', compact('rekam_medis','pasien'));

    }
    public function store(Request $request){
        DB::beginTransaction();

        try{
            $send = $request->send;
            $pasien_id = $request->pasien_id;

            $transaction = new Transaction();
            $transaction->date =date('Y-m-d H:i:s');
            $transaction->pasien_id = $pasien_id;
            $transaction->status = $request->status;
            $transaction->ket = $request->ket;
            $transaction->save();

            foreach($send as $i){
                $product = Product::where('id',$i['product_id'])->first();
                $subtotal = $product->price * intval($i['product_qty']);

                $item = new Item();
                $item->qty = intval($i['product_qty']);
                $item->price = $subtotal;
                $item->transaction_id = $transaction->id;
                $item->product_id = intval($i['product_id']);
                $item->save();
            }
            DB::commit();
            return redirect (route('superadmin.transaction.index'))->with('pesan-berhasil','Anda berhasil menambah data transaksi');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect (route('superadmin.transaction.index'))->with('pesan-gagal','Anda gagal menambah data transaksi');
        }
    }

    public function trans_rm(Request $request){
        DB::beginTransaction();

        try{
            $send = $request->send;
            $pasien_id = $request->pasien_id;

            $transaction = new Transaction();
            $transaction->date =date('Y-m-d H:i:s');
            $transaction->pasien_id = $pasien_id;
            $transaction->status = $request->status;
            $transaction->ket = $request->ket;
            $transaction->save();

            foreach($send as $i){
                $rekam_medis = RekamMedis::where('id',$i['rm_id'])->first();
                $subtotal = $rekam_medis->biaya * intval($i['rm_qty']);

                $item = new ItemRM();
                $item->qty = intval($i['rm_qty']);
                $item->price = $subtotal;
                $item->transaction_id = $transaction->id;
                $item->rekam_medis_id = intval($i['rm_id']);
                $item->save();
            }
            DB::commit();
            return redirect (route('superadmin.transaction.index'))->with('pesan-berhasil','Anda berhasil menambah data transaksi');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect (route('superadmin.transaction.index'))->with('pesan-gagal','Anda gagal menambah data transaksi');
        }
    }

    public function print($id){

        $transaction = Transaction::select('transactions.*','pasien.name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->where('transactions.id',$id)
            ->first();


        $item = Item::select('items.*','products.name as product_name','products.price as product_price')
            ->join('transactions','transactions.id','=','items.transaction_id')
            ->join('products','products.id','=','items.product_id')
            ->where('transactions.id',$id)
            ->get();

        $html= view ('superadmin/content/transaction/print', compact('transaction','item'));
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->output();
    }
    public function printRM($id){

        $transaction = Transaction::select('transactions.*','pasien.name')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->where('transactions.id',$id)
            ->first();

        $item = ItemRM::select('item_rm.*','rekam_medis.spesialis','rekam_medis.biaya')
         ->join('transactions','transactions.id','=','item_rm.transaction_id')
         ->join('rekam_medis','rekam_medis.id','=','item_rm.rekam_medis_id')
         ->where('transactions.id',$id)
         ->get();

        $html= view ('superadmin/content/transaction/printRM', compact('transaction','item'));
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->output();
    }

}

