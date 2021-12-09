@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.dokter.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter" value="{{$dokter->nama_dokter}}" class="form-control" placeholder="Nama Dokter" required>

        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="{{$dokter->id}}">
            <a href="{{route('superadmin.dokter.index')}}" class="btn btn-dark btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
