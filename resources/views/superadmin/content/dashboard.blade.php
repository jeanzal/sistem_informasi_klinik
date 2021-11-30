@extends('superadmin/layout/main')
@section('content')
    Selamat datang {{Auth::guard('superadmin')->user()->name}}





@endsection
