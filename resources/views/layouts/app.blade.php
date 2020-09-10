<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Layout of the carbon emission calculater -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>car6on</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            font-family: 'Lato', sans-serif;
            background-color: #008080;
            color: #808080;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #008080;
        }

        .form-box {
            border-radius: 5px;
        }

        .message {
            font-size: 30px;
            line-height: 45px;
            background-color: #FFF;
        }
    </style>
</head>

<body>
    <div>
        <div class="container"> 

            <!-- Accessing Calculator -->
            @yield('form-content')

        </div>
    </div>
</body>
</html>
