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
        $data = Pembayaran::select('pembayaran.*','transactions.status','pasien.name as nama_pasien')
            ->join('transactions','transactions.id','=','pembayaran.transaction_id')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->get();
        return view ('superadmin/content/pembayaran/list', compact('data'));
    }

}
// SELECT *, pasien.name FROM pembayaran INNER JOIN transactions AS t ON pembayaran.id = t.id INNER JOIN pasien ON t.pasien_id = pasien.id;