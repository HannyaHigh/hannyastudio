<html>

<head>
    <!-- CSS Files -->
    <link href="{{asset('../assets/css/login.css')}}" rel="stylesheet" />
    <link href="{{asset('../assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
    <title>
        Hannya Studio.
    </title>
</head>

<body>
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    @if(Session::has('mensaje'))
    <center><div class="alert alert-danger">{{Session::get('mensaje')}}</div></center>
    @endif
    <form action="{{route('validar')}}" method="POST">
        {{csrf_field()}}
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign In</h5>
                            <form class="">
                                <div class="form-label-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address">
                                    <label for="dni">Email address
                                        @if($errors->first('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                        @endif
                                    </label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="contraseña" name="contraseña" class="form-control" placeholder="Password">
                                    <label for="dni">Password
                                        @if($errors->first('contraseña'))
                                        <p class="text-danger">{{$errors->first('contraseña')}}</p>
                                        @endif
                                    </label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                                <hr class="my-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
   
</body>

</html>