<html>

<head>
    <title>Atur Ulang Kata Sandi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>

</head>

<body>
&nbsp;

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">SISTEM INFORMASI KLINIK</h1>
                                    <small>Reset Password</small><br><br>
                                </div>
                                {{-- pesan Error --}}
                                    @if(\Session::has('pesan'))
                                        <div class="alert alert-danger" role="alert">
                                    {{ Session::get('pesan') }}
                                        </div>
                                @endif
                                <form class="user" method="post" action="{{route('auth.renew')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="password" name ="password" required class="form-control form-control-user" id="exampleInputPassword1" placeholder="Password Baru">
                                        <input type="hidden" name="token" value="{{$emailHash}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name ="new_password" required class="form-control form-control-user" id="new_password" placeholder="Konfirmasi Password Baru">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">Atur Ulang</button>
                                    <hr>
                                    <a href="{{route('auth.index')}}" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-trash-alt fa-fw"></i> Kembali Login
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->

<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

<script>






</body>

</html>
