<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <title>Đăng Ký</title>
</head>

<body class="bg-gradient-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản mới!</h1>
                            </div>
                            <form class="user" action="{{ route('auth.register-success') }}" method="POST">
                                @csrf
                                <div class="form-group ">

                                    <input type="text" class="form-control form-control-user" name="name"
                                        id="exampleLastName" placeholder="Họ Tên....">
                                </div>
                                @if ($errors->has('name'))
                                   <span class="text-danger">
                                    {{ $errors->first('name') }}
                                   </span>
                                @endif
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Địa chỉ email....">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Mật khẩu">
                                            @if ($errors->has('password'))
                                            <span class="text-danger">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                        </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="password" name="repassword" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu">
                                            @if ($errors->has('repassword'))
                                            <span class="text-danger">
                                               {{ $errors->first('repassword') }}
                                            </span>
                                       @endif
                                        </div>
                                  
                                </div>
                               
                                <button class="btn btn-primary btn-user btn-block">
                                    Đăng ký tài khoản
                                </button>
                                <hr>
                                <a href="/auth/login-google" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Bạn quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('auth.login') }}">Bạn có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>
