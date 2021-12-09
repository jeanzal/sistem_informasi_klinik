@extends('superadmin/layout/main')
@section('content')
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Tambah Transaksi
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('superadmin.transaction.add')}}">Membeli Obat</a></li>
            <li><a class="dropdown-item" href="#">Rekam Medis</a></li>
        </ul>
    </div><br><br>
    <div class="table">
        <table class="table table-hover">
            <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($transaction as $row)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{date('d M y h:m:s', strtotime($row->date))}}</td>
                    <td>{{$row->name}}</td>
                    <td>
                        <a href="{{route('superadmin.transaction.detail',$row->id)}}" data-toggle="tooltip" data-placement="top" title="View Detail"><i class="fa fa-eye"></i></a>
                        <a href="{{route('superadmin.transaction.print',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Print Detail" target="_blank"><i class="fa fa-print"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
