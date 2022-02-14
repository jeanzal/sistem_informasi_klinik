@extends('user/layout/main')
@section('content')

    <!-- {{Auth::guard('user')->user()->name;}} -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <a href="{{route('superadmin.pengguna.index')}}"> Jumlah Transaksi </a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$trans->count()}} Transaksi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection



