@extends('user/layout/main')
@section('content')

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
            @foreach($riwayat as $row)
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
                            <a href="{{route('user.riwayatTransaksi.detail',$row->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Detail Transaksi Membeli Obat"><i class="fa fa-eye"></i></a>
                        @elseif($row->ket == "Rekam Medis")
                        <a href="{{route('user.riwayatTransaksi.detailRM',$row->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Detail Transaksi Rekam Medis"><i class="fa fa-eye"></i></a>
                        @endif

                        @if($row->status == "Sudah Bayar")
                            @if($row->ket == "Membeli Obat")
                                <a href="{{route('user.riwayatTransaksi.print',$row->id)}}" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Print Detail Pembelian Obat" target="_blank"><i class="fa fa-print"></i></a>
                            @elseif($row->ket == "Rekam Medis")
                                <a href="{{route('user.riwayatTransaksi.printRM',$row->id)}}" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Print Detail Rekam Medis" target="_blank"><i class="fa fa-print"></i></a>
                            @endif
                        @elseif($row->status == "Blom Bayar")
                            @if($row->ket == "Membeli Obat")
                                <a href="#" data-target="#bayarTr" class="btn btn-sm btn-danger" data-toggle="modal"><i class="fa fa-money-bill"> Bayar</i></a>
                            @elseif($row->ket == "Rekam Medis")
                                <a href="#" data-target="#bayarTr" class="btn btn-sm btn-danger" data-toggle="modal"><i class="fa fa-money-bill"> Bayar</i></a>
                            @endif
                        @endif
                        
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>

<!-- Bayar Modal  -->

<div class="modal fade" id="bayarTr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proses Pembayaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Lakukan Pembayaran dengan via Tranfer </p>
                <p>BRI : 526151132516531 an. <b>Klink Kelompok 2</b></p>
                <p>BNI : 0129431853 an. <b>Klink Kelompok 2</b></p>
                <p>Jika sudah melakukan pembayaran, upload bukti pembayaran melalui wa berikut</p>
                <p><a href="https://wa.me/6281363907441" target="_blank">WA Klinik Kelompok 2   </a></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

@endsection
