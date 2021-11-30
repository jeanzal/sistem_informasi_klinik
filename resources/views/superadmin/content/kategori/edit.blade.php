@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.kategori.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{$kategori->name}}" class="form-control" placeholder="Nama" required>

        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="{{$kategori->id}}">
            <a href="{{route('superadmin.kategori.index')}}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
