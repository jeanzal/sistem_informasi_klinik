@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.pengguna.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"placeholder="Nama" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control"placeholder="Email" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="sa">Super Admin</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <input type="file" name="image" accept="image/png,image/jpeg,image/jpg" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <a href="{{route('superadmin.pengguna.index')}}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>

    </form>

@endsection

