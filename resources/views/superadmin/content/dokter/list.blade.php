@extends('superadmin/layout/main')
@section('content')

    <a href="{{route('superadmin.dokter.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah data</a><br><br>
    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Dokter</th>
            <th scope="col">Spesialis</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($dokter as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->nama_dokter}}</td>
                <td>{{$data->spesialis}}

                </td>
                <td>
                    <a href="{{route('superadmin.dokter.edit', $data->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-edit"></i></a>
                    <a onclick = "return confirm('Apakah Anda Yakin?')" href="{{route('superadmin.dokter.delete', $data->id)}}" data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection