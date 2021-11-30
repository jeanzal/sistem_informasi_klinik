@extends('superadmin/layout/main')
@section('content')
    <a href="{{route('superadmin.kategori.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah data</a><br><br>
    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori Obat</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @php 
            $no = 1;
        @endphp
        @foreach($kategori as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->name}}</td>
                <td>
                    <a href="{{route('superadmin.kategori.edit', $row->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-edit"></i></a>
                    <a onclick = "return confirm('Apakah Anda Yakin?')" href="{{route('superadmin.kategori.delete', $row->id)}}" data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
