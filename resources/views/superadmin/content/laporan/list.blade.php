@extends('superadmin/layout/main')
@section('content')

    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Laporan Semua Transaksi 
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" target="_blank" href="{{route('superadmin.laporan.pdfSemua')}}">PDF</a></li>
            <li><a class="dropdown-item" target="_blank" href="{{route('superadmin.laporan.exSemua')}}">EXCEL</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Laporan Pembelian Obat
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" target="_blank" href="{{route('superadmin.laporan.pdfPO')}}">PDF</a></li>
            <li><a class="dropdown-item" target="_blank" href="{{route('superadmin.laporan.exPO')}}">EXCEL</a></li>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Laporan Rekam Medis
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" target="_blank" href="{{route('superadmin.laporan.pdfRM')}}">PDF</a></li>
            <li><a class="dropdown-item" target="_blank" href="{{route('superadmin.laporan.exRM')}}">EXCEL</a></li>
        </ul>
    </div>

@endsection