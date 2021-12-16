<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Pembayaran;
use App\Models\Transaction;
use App\Models\Item;
use App\Models\ItemRM;
use App\Models\Pasien;


class PembayaranController extends Controller
{
    public function index(){
        Session::put('title','Data Pembayaran');
        $data = Pembayaran::select('pembayaran.*','transactions.status')
            ->join('transactions','transactions.id','=','pembayaran.transaction_id')
            ->get();
        return view ('superadmin/content/pembayaran/list', compact('data'));
    }

}