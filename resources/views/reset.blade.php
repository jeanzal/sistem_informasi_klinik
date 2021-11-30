
<html>

<head>
    <title>reset Password</title>
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

<form method="post" action="{{route('auth.forgot')}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name ="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <a href="{{route('auth.index')}}">Kembali login</a>
    </div>

    <p></p>
    <button type="submit" class="btn btn-primary">Submit</button>

    <p>&nbsp;</p>
    <span>{{date('Y-m-d')}}</span>
</form>
</div>
<div class="col-sm">

</div>
</div>
</div>





</body>

</html>
