<html>

<head>
    <title>Atur Ulang Kata Sandi</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
&nbsp;

<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
            {{-- pesan Error --}}
            @if(\Session::has('pesan'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('pesan') }}
                </div>
            @endif

            <form method="post" action="{{route('auth.renew')}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" name ="password" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi password Baru</label>
                    <input type="password" name ="new_password" required class="form-control" id="new_password" placeholder="new_password">
                </div>

                <div class="form-group">
                    <a href="{{route('auth.index')}}">Kembali login</a>
                </div>

                <p></p>
                <button type="submit" class="btn btn-primary">Atur Ulang</button>

                <p>&nbsp;</p>
                <input type="hidden" name="token" value="{{$emailHash}}">
                <span>{{date('Y-m-d')}}</span>
            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>





</body>

</html>
