<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Reset Password</title>
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="jquery.3.4.1.js"></script>
        <script src="all.min.js"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
        <link rel="stylesheet" href="path/to/fontawesome.min.css">
        <style>
            body{
                background: ;
                overflow: hidden;
                position: relative;
                height: 100vh;
                width: 100%;
                padding:0;
                margin:0px;
            }

            #headerNav{
                top: 0;
                width: 100%;
                padding-top: 10px;
                padding-bottom: 10px;
                border-radius: 5px;
            }

            button{
                background: linear-gradient(132deg, #FC415A, #591BC5, #212335);
                text-decoration: none;
            }

            .alert{
                position: absolute;
                top: 5px;
                right: 10px;
                padding: 20px 40px;
                border-radius: 5px;
                border-left: 5px solid rgb(28, 78, 28);
                background-color: rgb(106, 168, 126);
                overflow: hidden;
                z-index: 999;
            }

            .check{
                position: absolute;
                top: 50%;
                left: 20px;
                transform: translateY(-50%);
                font-size: 30px;
                color: rgb(3, 71, 3);
            }

            .msg{
                font-size: 19px;
                color: rgb(32, 90, 32);
                margin: 0 30px;
                user-select: none;
            }

            .crose{
                padding: 20px 18px;
                background-color: rgb(47, 112, 47);
                font-size: 30px;
                color: rgb(33, 83, 33);
                position: absolute;
                top: 50%;
                right: 0;
                transform: translateY(-50%);
                cursor: pointer;
                transition: .3s;
            }

            .crose:hover{
                background-color: rgb(51, 100, 51);
            }

        </style>
    </head>
    <body>
        <div class="headerNav" id="headerNav">
            <div class="container d-flex justify-content-between">
                <div class="side">
                    <span style="font-size:30px;" onclick="history.back()"><i class="fa fa-long-arrow-left"></i></span>
                </div>
                <div class="title d-flex justify-content-center align-items-center">
                    <a href="#"><i class="fa fa-info-circle"></i></a>
                </div>
            </div>
        </div>
        @if(Session::has('success'))
            <div class="alert">
                <span class="check"><i class="fa fa-check-circle"></i></span>
                <span class="msg">{{Session::get('success')}}</span>
                <span class="crose" data-dismiss="alert">&times;</span>
            </div>
        @endif
        <div class="row" style="margin-top: 50px;">
            <div class="col-1"></div>
            <div class="col-10">
                <h2>Reset Password</h2>
                <p>Enter the email associated with your account and we'll send an email with instructions to reset your password.</p>
                <br>
                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email">Email address</label>
                            <input type="text" id="email" class="form-control" name="email" required autofocus>
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                Send Password Reset Link
                            </button>
                        </div> 
                    </div>
                    
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </body>
</html>