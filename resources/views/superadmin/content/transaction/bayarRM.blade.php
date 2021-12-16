@extends('superadmin/layout/main')
@section('content')

    @php
        $total =0;
    @endphp

<form action="{{route('superadmin.transaction.aksi')}}" method="post">
    @csrf
    <div class="form-group">
        <label>Petugas Penanggung Jawab</label>
        <input name="pengguna_id" type="hidden" value="{{$transaction->pengguna_id}}">
        <input class="form-control" type="text" value="{{$transaction->pengguna_name}}" readonly>
    </div>
    <div class="form-group">
        <label>Nama Pasien</label>
        <input name="pasien_id" type="hidden" value="{{$transaction->pasien_id}}">
        <input class="form-control" type="text" value="{{$transaction->name}}" readonly>
    </div>
    <div class="form-group">
        <label>Tanggal Transaksi</label>
        <input class="form-control" name="date" type="text" value="{{$transaction->date}}" readonly>
    </div>
        @foreach($item as $row)
            @php
                $total +=$row->biaya * $row->qty;
            @endphp
        @endforeach
    <div class="form-group">
        <label>Total Bayar</label>
        <input type="text" class="form-control" value="{{$total}}" readonly>
    </div>
    <div class="form-group">
        <label>Metode Pembayaran</label>
        <select class="form-control" name="metode_bayar">
            <option value="BRI">BRI</option>
            <option value="BNI">BNI</option>
        </select>
    </div>
    <input type="hidden" name="status" value="Sudah Bayar">
    <input type="hidden" name="id" value="{{$transaction->id}}">
    <input type="hidden" name="ket" value="{{$transaction->ket}}">
    <a href="{{route('superadmin.transaction.index')}}" class="btn btn-sm btn-dark"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-save"></i> Proses Bayar</button>
</form>
@endsection