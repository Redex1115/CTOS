<!Doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no" />
        <meta name="description" content="Exsuper" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="theme-color" content="#100DD1" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title>CTOS</title>
        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Styles -->
        <style>

            .loader-wrapper {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                background-color: #242f3f;
                display:flex;
                justify-content: center;
                align-items: center;
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
        </style>
    </head>
    <body>
        <div class="content">
                            <table>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>B</td>
                                    <td>C</td>
                                </tr>
                            </table>
                </div>
            
        <!-- Preloader -->
        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>

        
        <!-- Script -->
        <script>
            $(window).on("load",function(){
                setTimeout(() => {
                    $(".loader-wrapper").fadeOut();
                }, 1500);
            });
        </script>
    </body>
</html>
