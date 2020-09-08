<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>car6on</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #008080;
            color: #808080;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .message {
            font: bold 45px serif;
            background-color: #FFF;
        }
    </style>
</head>

<body>
    <div>
        <!-- Title -->
        <nav class="navbar navbar-light bg-light justify-content-md-center">
            <h1>Car<h1 style="color: #008080">6<h1>on</h1>
        </nav>

        <!-- Form -->
        <div class="container p-5">
            <div class="row">
                <div class="col">
                </div>
                <div class="col-6">
                    <form method="POST" action="/json-api">

                        <!-- Input data for Distance -->
                        <div class="form-row">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control shadow-none" name="activityDistance" required>
                                <div class="w-25 input-group-append">
                                    <span class="w-100 input-group-text" id="basic-addon2">Miles</span>
                                </div>
                            </div>
                        </div>

                        <!-- Input data for Mode -->
                        <div class="form-row">
                            <div class="input-group mb-3">
                                <div class="w-25 input-group-prepend">
                                    <label class="w-100 input-group-text">Mode</label>
                                </div>
                                <select name="activityMode" class="form-control shadow-none">
                                    <option value="taxi">Taxi</option>
                                    <option value="dieselCar">Diesel Car</option>
                                    <option value="petrolCar">Petrol Car</option>
                                    <option value="anyCar">Any Car</option>
                                    <option value="economyFlight">Economy Flight</option>
                                    <option value="businessFlight">Business Flight</option>
                                    <option value="firstclassFlight">First Class Flight</option>
                                    <option value="anyFlight">Any Flight</option>
                                    <option value="motorbike">Motorbike</option>
                                    <option value="bus">Bus</option>
                                    <option value="transitRail">Transit Rail</option>
                                </select>
                            </div>
                        </div>

                        <!-- Input data for Country -->
                        <div class="form-row">
                            <div class="input-group mb-3">
                                <div class="w-25 input-group-prepend">
                                    <label class="w-100 input-group-text">Country</label>
                                </div>
                                <select name="activityCountry" class="form-control shadow-none">
                                    <option value="gbr">United Kingdom</option>
                                    <option value="usa">United States of America</option>
                                    <option value="def">Other Countries</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-dark shadow-none" name="submit" onClick="{{action('FootprintController@index')}}" type="submit">Calculate</button>
                        </div>
                    </form>
                </div>
                <div class="col">
                </div>
            </div>

            <!-- Check if data is retreived -->

            @if(\Session::has('message'))
            <div class="row">
                <div class="col">
                </div>
                <div class="m-5 col-6 text-center alert message">
                    <p>{{\Session::get('message')}} kg</p>
                </div>
                <div class="col">
                </div>
            </div>
            @endif

        </div>
    </div>
</body>
</html>
