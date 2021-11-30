@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.kategori.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name"  class="form-control" placeholder="Nama" required>

        </div>
        <div class="form-group">
            <a href="{{route('superadmin.kategori.index')}}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
