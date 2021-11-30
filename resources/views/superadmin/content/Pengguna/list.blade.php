@extends('superadmin/layout/main')
@section('content')

    <a href="{{route('superadmin.pengguna.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
    <a href="{{route('superadmin.pengguna.export')}}" class="btn btn-sm btn-success"><i class="fa fa-file-excel"></i> Download Excel</a><br><br>

    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>

        @php 
            $no = 1;
        @endphp
        @foreach($pengguna as $row)

            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->role}}</td>
                <td>{{$row->email}}</td>
                <td>{{Helper::active($row->status)}}</td>
                <td>
                    <a href="{{route('storage_file',$row->image)}}" target="_blank"><img src="{{route('storage_file',$row->image)}}" width="50px"></a>
                </td>
                <td>

                    <a href="{{route('superadmin.pengguna.edit',$row->id)}}"data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Apakah anda yakin?')" href="{{route('superadmin.pengguna.delete',$row->id)}}"data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fa fa-trash"></i></a>
                    <a href="{{route('download_file',$row->image)}}"data-toggle="tooltip" data-placement="top" title="Downlaod file"><i class="fa fa-download"></i></a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>


@endsection
