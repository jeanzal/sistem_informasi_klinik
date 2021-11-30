@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.pasien.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="name" value="{{$pasien->name}}" class="form-control" placeholder="Nama Pasien" required>

        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="{{$pasien->id}}">
            <a href="{{route('superadmin.pasien.index')}}" class="btn btn-dark btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </form>
@endsection
