<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use App\Models\Transaction;
use App\Models\Item;
use App\Models\Pasien;
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
     Session::put('title','Detail Transaksi');
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
    public function add(){
        Session::put('title','Tambah Transaksi Baru');
        $product = Product::all();
        $pasien = Pasien::all();
        return view ('superadmin/content/transaction/add', compact('product','pasien'));

    }
    public function store(Request $request){
        DB::beginTransaction();

        try{
            $send = $request->send;
            $pasien_id = $request->pasien_id;

            $transaction = new Transaction();
            $transaction->date =date('Y-m-d H:i:s');
            $transaction->pasien_id = $pasien_id;
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

}

