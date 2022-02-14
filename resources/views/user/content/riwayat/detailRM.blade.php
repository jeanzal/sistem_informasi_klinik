@extends('user/layout/main')
@section('content')

    @php
     $total =0;
    @endphp


    <h4>Detail Transaksi <b>{{$transaction->name}}</b></h4>

    <label>Id Transaksi : {{$transaction->id}}</label><br/>
    <label>Tanggal Transaksi : {{date('d M y h:m:s', strtotime($transaction->date))}}</label><br/>
    <label>Nama Pasien : <b>{{$transaction->name}}</b></label><br>
    <label>Keterangan Transaksi : <b>{{$transaction->ket}}</b></label><br>
    

    <p></p>
    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">Diagnosa</th>
            <th scope="col">Dokter yang menangani</th>
            <th scope="col">Biaya</th>
            <th scope="col">Banyaknya Penanganan</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($item as $row)
            @php
                $total +=$row->biaya * $row->qty;
                $subtotal = $row->biaya * $row->qty;
            @endphp

            <tr>
                <td>{{$row->spesialis}}</td>
                <td>{{$row->nama_dokter}}</td>
                <td>{{Helper::rupiah($row->biaya)}}</td>
                <td>{{$row->qty}}</td>
                <td>{{Helper::rupiah($subtotal)}}</td>

            </tr>
            
        @endforeach
        <tr>
                <th colspan="4" class="text-right">Total Bayar :</th>
                <th class="table-dark">{{Helper::rupiah($total)}}</th>
            </tr>
        </tbody>
    </table>
    <a href="{{route('user.riwayatTransaksi.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
@endsection
