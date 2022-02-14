@extends('superadmin/layout/main')
@section('content')


    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Pembayaran</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Nama Pasien</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($data as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->tgl_bayar}}</td>
                <td>{{$d->metode_bayar}}</td>
                <td>{{$d->nama_pasien}}</td>
                <td>
                    @if($d->status == "Sudah Bayar")
                        <div class="badge badge-success">Lunas</div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection