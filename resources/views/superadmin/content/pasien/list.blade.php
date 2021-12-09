@extends('superadmin/layout/main')
@section('content')
    <a href="{{route('superadmin.pasien.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah data</a><br><br>
    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Keluhan Pasien</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($pasien as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->keluhan}}</td>
                <td>{{$row->ket}}</td>
                <td>
                    <a href="{{route('superadmin.pasien.edit', $row->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-edit"></i></a>
                    <a onclick = "return confirm('Apakah Anda Yakin?')" href="{{route('superadmin.pasien.delete', $row->id)}}" data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
