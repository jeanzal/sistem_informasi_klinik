@extends('user/layout/main')
@section('content')

    @php
     $total =0;
    @endphp


    <h4>Detail Transaksi <b>{{$transaction->name}}</b></h4>

    <label>Id Transaksi : {{$transaction->id}}</label><br/>
    <label>Tanggal Transaksi : {{date('d M y h:m:s', strtotime($transaction->date))}}</label><br/>
    <label>Nama Pasien : <b>{{$transaction->name}}</b></label><br>
    <label>Keterangan Transaksi : <b>{{$transaction->ket}}</b></label>

    <p></p>
    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">Produk</th>
            <th scope="col">Harga satuan</th>
            <th scope="col">Banyaknya</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($item as $row)
            @php
                $total +=$row->product_price * $row->qty;
                $subtotal = $row->product_price * $row->qty;
            @endphp

            <tr>
                <td>{{$row->product_name}}</td>
                <td>{{Helper::rupiah($row->product_price)}}</td>
                <td>{{$row->qty}}</td>
                <td>{{Helper::rupiah($subtotal)}}</td>

            </tr>
            
        @endforeach
        <tr>
                <th colspan="3" class="text-right">Total Bayar :</th>
                <th class="table-dark">{{Helper::rupiah($total)}}</th>
            </tr>
        </tbody>
    </table>
    <a href="{{route('user.riwayatTransaksi.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
@endsection
