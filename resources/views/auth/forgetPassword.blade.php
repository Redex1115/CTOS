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
                overflow-x: hidden;
            }

            .header i{
                font-size: 30px;
                color: black;
            }

            button{
                background: linear-gradient(132deg, #FC415A, #591BC5, #212335);
                text-decoration: none;
            }



        </style>
    </head>
    <body>
        @include('pages.session')
        @include('refresh')
        <div class="row">
            <div class="col-1">
                <div class="header">
                    <a href="{{ route('login')}}"><i class="fa fa-long-arrow-left"></i></a>
                </div>
            </div>
            <div class="col-10">
                <br><br>
                <h2>Reset Password</h2>
                <p>Enter the email associated with your account and we'll send an email with instructions to reset your password.</p>
                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="email">Email address</label>
                            <input type="text" id="email" class="form-control" name="email" required autofocus>
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-12">
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