<!Doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/overlay.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
        <style>
            .loader-wrapper {
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #242f3f;
                display:flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
            }
            .loader {
                display: inline-block;
                width: 30px;
                height: 30px;
                position: relative;
                border: 4px solid #Fff;
                animation: loader 2s infinite ease;
            }
            .loader-inner {
                vertical-align: top;
                display: inline-block;
                width: 100%;
                background-color: #fff;
                animation: loader-inner 2s infinite ease-in;
            }

            .fade-out{
                animation: fade-out 1s forwards ease-in;
            }

            @keyframes loader {
                0% { transform: rotate(0deg);}
                25% { transform: rotate(180deg);}
                50% { transform: rotate(180deg);}
                75% { transform: rotate(360deg);}
                100% { transform: rotate(360deg);}
            }

            @keyframes loader-inner {
                0% { height: 0%;}
                25% { height: 0%;}
                50% { height: 100%;}
                75% { height: 100%;}
                100% { height: 0%;}
            }

            @keyframes fade-out {
                0% { opacity: 1; }
                100% { opacity: 0; visibility: hidden; }
            }
        </style>
    </head>
    <body>
        <div class="loader-wrapper" id="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
        <!-- Navigation -->
        <div id="mySidenav" class="sidenav">
            <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#"><img src="{{asset('img/user.png')}}" alt="User"></a>
            <p>{{Auth()->user()->name}}</p>
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

        <!-- Session -->
        @if(Session::has('success'))
            <div class="alert" id="success">

            </div>
        @elseif(Session::has('error'))
            <div class="aler" id="error">
                
            </div>
        @endif

        <!-- Pull Down Refresh -->
        @include('refresh')

        <!-- Header -->
        <div class="header-area" id="header-area">
            <div class="container h-100 d-flex align-items-center justify-content-start">
                <span style="font-size:30px; color:#591BC5; cursor:pointer;" onclick="openNav()">&#9776;</span>
            </div>
        </div>

        @yield('content')
        
        <!-- Footer -->
        <div class="footer-nav-area" id="footerNav">
            <div class="container h-100 px-0">
                <div class="suha-footer-nav h-100">
                    <ul class="h-100 d-flex align-items-center justify-content-around ps-0">
                        <li><a href="#" onclick="history.back()"><i class="fa fa-fw fa-solid fa-arrow-left"></i></a></li>
                        <li><a href="/home"><i class="fa fa-fw fa-home"></i></a></li>
                        <li><a href="#"><i class="fa fa-fw fa-solid fa-user"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Script -->
        @yield('script')
        <script>

            function openNav(){
                document.getElementById("mySidenav").style.width = "100%";
            }

            function closeNav(){
                document.getElementById("mySidenav").style.width = "0%";
            }

            var loaderWrapper = document.getElementById('loader-wrapper');

            window.addEventListener('load',function(){
                loaderWrapper.classList.add('fade-out');
            });
        </script>
    </body>
</html>