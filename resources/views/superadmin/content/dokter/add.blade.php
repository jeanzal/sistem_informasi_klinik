@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.dokter.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter"  class="form-control" placeholder="Nama Dokter" required>
        </div>
        <div class="form-group">
            <a href="{{route('superadmin.dokter.index')}}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
