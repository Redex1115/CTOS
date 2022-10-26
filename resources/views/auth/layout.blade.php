<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body{
                overflow-x: hidden;
            }

            .background {
                background: linear-gradient(132deg, #FC415A, #591BC5, #212335);
                background-size: 400% 400%;
                animation: Gradient 15s ease infinite;
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

            #footerNav{
                bottom: 0;
                width: 100%;
                padding-top: 10px;
                padding-bottom: 10px;
                border-top: 1px solid #818181;
                border-radius: 5px;
                background: linear-gradient(132deg, #FC415A, #591BC5, #212335);
                color: white;
                margin-top: auto;
                position: fixed;
            }
            a{
                text-decoration: none;
            }

            a:hover{
                text-decoration: none;
                color: #f1f1f1;
            }

            .fa{
                font-size: 25px;
                color: #f1f1f1;
            }

            .overlay {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: rgb(0,0,0);
                background-color: rgba(0,0,0, 0.9);
                overflow-x: hidden;
                transition: 0.5s;
            }

            .overlay-content {
                position: relative;
                top: 25%;
                width: 100%;
                text-align: center;
                margin-top: 30px;
            }

            .overlay a {
                padding: 8px;
                text-decoration: none;
                font-size: 36px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .overlay a:hover , .overlay a:focus{
                color: #f1f1f1;
            }

            .overlay .closebtn {
                position: absolute;
                top: 20px;
                right: 45px;
                font-size: 60px;
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

            @keyframes alert {
                from{
                    transform: translateX(0%);
                    opacity: 1;
                }
                to{
                    transform: translateX(100%);
                    opacity: 0;
                }
            }

            .title{
                padding-left: 40%;
            }

            @keyframes Gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }
            
            .refresh-container{
                width: 50px;
                height: 50px;
                margin: 0 auto;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #0430e2;
                border-radius: 100%;
            }

            .spinner{
                width:30px;
                height:30px;
            }
        </style>
    </head>
    <body class="background text-white">
        <div class="overlay" id="navContent">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                @if(auth()->user()->isAdmin())
                <a href="/agent-registration">Register Agent</a>
                <a href="/userRegistration">Register Member</a>
                <a href="{{ route('logout') }}">Logout</a>
                @elseif(auth()->user()->isAgent())
                <a href="/userRegistration">Register Member</a>
                <a href="{{ route('logout') }}">Logout</a>
                @elseif(auth()->user()->isMember())
                <a href="{{ route('logout') }}">Logout</a>
                @endif
            </div>
        </div>
        @include('refresh')
        <div class="headerNav" id="headerNav">
            <div class="container d-flex">
                <div class="sideNav">
                    <span style="font-size:30px; color:#f1f1f1; cursor:pointer;" onclick="openNav()">&#9776;</span>
                </div>
                <div class="title d-flex justify-content-cente">
                    <a href="#"><h2 style="color: #f1f1f1; font-family:Lucida Console, Courier New, monospace;">CTOS</h2></a>
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

        <div class="container">
            @yield('content')
        </div>

        <div class="footerNav" id="footerNav">
            <div class="container d-flex align-item-center justify-content-around">
                <a href="#" onclick="history.back()"><i class="fa fa-fw fa-solid fa-arrow-left"></i></a>
                <a href="/home"><i class="fa fa-fw fa-home"></i></a>
                <a href="#"><i class="fa fa-fw fa-solid fa-user"></i></a>
            </div>
        </div>

        @yield('script')

        <script>
            function openNav(){
                document.getElementById("navContent").style.width = "100%";
            }

            function closeNav(){
                document.getElementById("navContent").style.width = "0%";
            }
        </script>
    </body>
</html>
