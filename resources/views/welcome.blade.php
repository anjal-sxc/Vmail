<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VMail - Voice Based E-Mail for Visually Impaired People</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #f5fbfd;
                color: #87ceeb;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .flex-column {
                flex-direction: column;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }


            .title h1 {
                font-size: 100pt;
                margin: 0;
            }


            .title p {
                margin: 0;
                font-size: 20pt;
                font-weight: bold;
            }

            .links {
                position: relative;
                bottom: 100px;
            }

            .links > a {
                color: #87ceeb;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body id="welcome" class="flex-center flex-column">

        <div class="flex-center position-ref full-height" id="welcomePage">

            <div class="content">
                <div class="title">
                    <h1>VMail</h1>
                    <p class="text-sm">A voice based e-mail system for visually impaired people...</p>
                </div>


            </div>
        </div>

        <div class="links">
            <a id="login" href="login" tabindex="1">Login</a>
            <a id="register" href="register" tabindex="2">Register</a>
        </div>


    <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
    <script type="text/javascript">

        document.getElementById('welcomePage').addEventListener('click', function () {
            say('Hello, welcome to v mail! Use TAB ' +
                'to navigate. Use ENTER to select. ' +
                'Click anywhere for help.');
        });


        document.getElementById('login').addEventListener('focus', function () {
            say('Login');
        });

        document.getElementById('register').addEventListener('focus', function () {
            say('Register');
        });

    </script>

    </body>

</html>
