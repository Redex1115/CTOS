<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link rel="stylesheet" href="path/to/fontawesome.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body{
                font-family: 'Josefin Sans', sans-serif;
                box-sizing: border-box;
            }

            .container-fluid{
                height: 100%;
                margin: 0;
                padding: 0;
                width: 100%;
                background: #FFF;
            }
            
            .background {
                background: linear-gradient(132deg, #FC415A, #591BC5, #212335);
                background-size: 400% 400%;
                animation: Gradient 15s ease infinite;
                position: relative;
                height: 100vh;
                width: 100%;
                overflow: hidden;
                padding:0;
                margin:0px;
            }
            .cube {
                position: absolute;
                top: 80vh;
                left: 45vw;
                width: 10px;
                height: 10px;
                border: solid 1px #D7D4E4;
                transform-origin: top left;
                transform: scale(0) rotate(0deg) translate(-50%, -50%);
                animation: cube 12s ease-in forwards infinite;
            }
            .cube:nth-child(2n) {
                border-color: #FFF ;
            }
            .cube:nth-child(2) {
                animation-delay: 2s;
                left: 25vw;
                top: 40vh;
            }
            .cube:nth-child(3) {
                animation-delay: 4s;
                left: 75vw;
                top: 50vh;
            }
            .cube:nth-child(4) {
                animation-delay: 6s;
                left: 90vw;
                top: 10vh;
            }
            .cube:nth-child(5) {
                animation-delay: 8s;
                left: 10vw;
                top: 85vh;
            }
            .cube:nth-child(6) {
                animation-delay: 10s;
                left: 50vw;
                top: 10vh;
            }

            header{
                position: absolute;
                top:0%;
                left: 0%;
                width:100%;
                margin: 0;
                padding: 0;
            }
            
            .logo{
                width: 35px;
                height: 35px;
                background: #EFEEF5;
                margin: -12px 190px;
                display: flex;
                justify-content: center;
                animation: logo 3s ease-in forwards;
            }
            .logo span{
                color: #591BC5;
                font-size: 2em;
                line-height: 1.4;
                font-weight: bold;
            }
            
            .header-content{
                margin-top:25%;
                text-align: center;
                color:  #EFEEF5;
            }
            .header-content h1{
                text-transform: uppercase;
                font-size: 3em;
                letter-spacing: 1px;
            }
            .header-content p {
                font-size: 20px;
                line-height: 1.5;
                margin: 20px auto;
            }
            .header-content button{
                width: 140px;
                margin:20px 10px;
                color: #591BC5;
                font-size: 17px;
                border:1px solid #EFEEF5;
                font-weight: 500;
                background: #EFEEF5;
                border-radius: 20px;
                padding: 10px;
                cursor:pointer;
                transition: .3s;
            }
            .header-content button:hover{
                border-radius: 0;
            }
            /* Animate Background*/
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
            @keyframes cube {
                from {
                    transform: scale(0) rotate(0deg) translate(-50%, -50%);
                    opacity: 1;
                }
                to {
                    transform: scale(20) rotate(960deg) translate(-50%, -50%);
                    opacity: 0;
                }
            }

            @keyframes logo {
                from{
                    transform: scale(0) rotate(360deg);
                }
                to{
                    transform: scale(2) rotate(0deg);
                }
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="background">
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
            </div>
            <header>
                <section class="header-content">
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="card text-white" style="border-radius: 1rem; background: #591BC5;">
                            <div class="logo"><span>M</span></div>
                                <div class="card-body p-5 text-center">
                                    <div class="mb-md-5 mt-md-4 pd-5">
                                        <h1>Welcome</h1>
                                        <p>Welcome To Mock_Up Application.</p>
                                        <button onclick="window.location='{{route("login")}}'">Get Started</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </header>
        </div>
    </body>
</html>