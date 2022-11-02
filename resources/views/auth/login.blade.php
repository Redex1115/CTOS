@include('refresh')

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login Page</title>
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
        <style>
            body{
                overflow-x: hidden;
                background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            }
            #error{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 998;
                user-select: none;
                background:  #f2f2f2;
                width: 310px;
                text-align: center;
                align-items: center;
                padding: 40px;
                border: 1px solid #b3b3b3;
                box-shadow: 0px 5px 10px rgb(0, 0, 0, 0.2);
            }

            #error i{
                font-size: 60px;
                color:rgb(189, 19, 19);
                padding: 20px 40px;
                margin: -50px 0 0 0;
            }

            #error .btn{
                margin: 20px 0 -10px 0;
                text-decoration: none;
                background: #999999;
                color: white;
                font-size: 18px;
                padding: 10px 13px;
                width: 100px;
                border-radius: 12px;
            }

            @media only screen and (max-width: 300px){
                #error{
                    width: 230px;
                }
            }
        </style>
    </head>
    <body>
        @include('pages.session')
        @include('refresh')
        <main class="login-form">
            <div class="container">
                <section class="vh-100 gradient-custom">
                    <div class="container py-4 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <div class="mb-md-5 mt-md-4 pd-5">
                                        <form action="{{ route('login.post') }}" method="POST">
                                            @csrf
                                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                            <p class="text-white-50 mb-5">Please enter your user name and password</p>
                                            <div class="form-group form-outline form-white mb-4">
                                                <input type="text" id="username" class="form-control form-control-lg" name="username" placeholder="User Name" required @if(Cookie::has('username')) value="{{Cookie::get('username')}}" @endif>
                                                @if ($errors->has('username'))
                                                    <span class="text-danger">{{ $error->first('username')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group form-outline form-white mb-4">
                                                <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Password" required @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <input type="checkbox" name="rememberme" @if(Cookie::has('username')) checked @endif)>Remember Me  
                                            </div>

                                            <p class="small mb-5 pb-lg-2"><a href="{{ route('forget.password.get') }}" class="text-white-50">Forgot password?</a></p>

                                            <button type="submit" class="btn btn-outline-light btn-lg px-5">Login</button>

                                            <div class="d-flex justify-content-around text-center mt-4 pt-1">
                                                <a href="#" class="text-whihte"><i class="fa fa-facebook" style="color: white;"></i></a>
                                                <a href="#" class="text-white"><i class="fa fa-twitter"></i></a>
                                                <a href="#" class="text-white"><i class="fa fa-solid fa-google"></i></a>
                                            </div>
                                            <br>
                                            <div>
                                                <p class="mb-0">Don't have an account</p> <a href="#" class="text-white-50 fw-bold">Sign Up</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </body>
</html>