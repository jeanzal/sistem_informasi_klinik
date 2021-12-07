@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.dashboard.update')}}" method="post">
        @csrf
        <div class="form-group">
            <labe>Nama</labe>
            <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Nama" required>
        </div>

        <div class="form-group">
            <labe>Email</labe>
            <input type="email" name="email" value="{{$data->email}}" class="form-control" placeholder="Email" required>
        </div>

        <div class="form-group">
            <labe>Role</labe>
            <select name="role" class="form-control" required>

                @php
                    $admin ='';
                    $sa ='';
                    if($data->role =="admin"){
                        $admin ="selected";
                    }else{
                        $sa="selected";
                    }
                @endphp

                <option value="admin" {{$admin}}>Admin</option>
                <option value="admin" {{$sa}}>Super Admin</option>
            </select>
        </div>

        <div class="form-group">
            <labe>Status</labe>
            <select name="status" class="form-control" required>

                @php
                    $aktif ='';
                    $tidakaktif ='';
                    if($data->status =="1"){
                        $aktif ="selected";
                    }else{
                        $tidakaktif="selected";
                    }
                @endphp

                <option value="1" {{$aktif}}>Aktif</option>
                <option value="0" {{$tidakaktif}}>Tidak Aktif</option>
            </select>
        </div>

        <div clas="form-group">
            <input type="hidden" name="id" value="{{$data->id}}">
            <a href="{{route('superadmin.dashboard.index')}}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i>  Kembali</a>
            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Ubah</button>
        </div>

    </form>
@endsection