@extends('superadmin/layout/main')
@section('content')
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Tambah Transaksi
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('superadmin.transaction.add')}}">Membeli Obat</a></li>
            <li><a class="dropdown-item" href="{{route('superadmin.transaction.addRM')}}">Rekam Medis</a></li>
        </ul>
    </div><br><br>
    <div class="table">
        <table class="table table-hover">
            <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Status</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Petugas Penanggung Jawab</th>
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
                        @if($row->status == "Sudah Bayar")
                            <div class="badge badge-success">{{$row->status}}</div>
                        @elseif($row->status == "Blom Bayar")
                            <div class="badge badge-danger">{{$row->status}}</div>
                        @endif
                    </td>
                    <td>
                        @if($row->ket == "Membeli Obat")
                            <div class="badge badge-info">{{$row->ket}}</div>
                        @elseif($row->ket == "Rekam Medis")
                            <div class="badge badge-warning">{{$row->ket}}</div>
                        @endif
                    </td>
                    <td>{{$row->pengguna_name}}</td>
                    <td>
                        @if($row->ket == "Membeli Obat")
                            <a href="{{route('superadmin.transaction.detail',$row->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Detail Transaksi Membeli Obat"><i class="fa fa-eye"></i></a>
                        @elseif($row->ket == "Rekam Medis")
                        <a href="{{route('superadmin.transaction.detailRM',$row->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Detail Transaksi Rekam Medis"><i class="fa fa-eye"></i></a>
                        @endif

                        @if($row->status == "Sudah Bayar")
                            @if($row->ket == "Membeli Obat")
                                <a href="{{route('superadmin.transaction.print',$row->id)}}" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Print Detail Pembelian Obat" target="_blank"><i class="fa fa-print"></i></a>
                            @elseif($row->ket == "Rekam Medis")
                                <a href="{{route('superadmin.transaction.printRM',$row->id)}}" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Print Detail Rekam Medis" target="_blank"><i class="fa fa-print"></i></a>
                            @endif
                        @elseif($row->status == "Blom Bayar")
                            @if($row->ket == "Membeli Obat")
                                <a href="{{route('superadmin.transaction.bayar',$row->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Proses Bayar Membeli Obat" ><i class="fa fa-money-bill"> Bayar</i></a>
                            @elseif($row->ket == "Rekam Medis")
                                <a href="{{route('superadmin.transaction.bayarRM',$row->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Proses Bayar Rekam Medis" ><i class="fa fa-money-bill"> Bayar</i></a>
                            @endif
                        @endif
                        
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
