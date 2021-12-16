<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SemuaTransaksi;
use App\Exports\SemuaTransaksiPO;
use App\Exports\SemuaTransaksiRM;


class LaporanController extends Controller
{
    public function index()
    {
        Session::put('title','Laporan Transaksi');
        // $pasien = Pasien::all();
        return view ('superadmin/content/laporan/list');
    }

    public function pdfSemua(){
        $transaction = Transaction::select('transactions.*','pasien.name as nama_pasien','admins.name as nama_pengguna')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->get();

        $html= view ('superadmin/content/laporan/pdfSemua', compact('transaction'));
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->output();
    }
    public function pdfPO(){
        $transaction = Transaction::select('transactions.*','pasien.name as nama_pasien','admins.name as nama_pengguna')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->get();

        $html= view ('superadmin/content/laporan/pdfPO', compact('transaction'));
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->output();
    }
    public function pdfRM(){
        $transaction = Transaction::select('transactions.*','pasien.name as nama_pasien','admins.name as nama_pengguna')
            ->join('pasien','pasien.id','=','transactions.pasien_id')
            ->join('admins','admins.id','=','transactions.pengguna_id')
            ->get();

        $html= view ('superadmin/content/laporan/pdfRM', compact('transaction'));
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->output();
    }
    public function exSemua(){
        return Excel::download(new SemuaTransaksi(), 'semua_transaksi.xlsx');
    }
    public function exPO(){
        return Excel::download(new SemuaTransaksiPO(), 'semua_transaksi_pembeli_obat.xlsx');
    }
    public function exRM(){
        return Excel::download(new SemuaTransaksiRM(), 'semua_transaksi_rekam_medis.xlsx');
    }
}