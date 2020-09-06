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
    </style>
</head>

<body>
    <div>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <nav class="navbar navbar-light bg-light justify-content-md-center">
            <h1>Car<h1 style="color: #008080">6<h1>on</h1>
        </nav>

        <div class="container p-5">
            <div class="row">
                <div class="col">
                </div>
                <div class="col-6">
                    <form>
                        <div class="form-row">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control shadow-none" id="validationDefault01" required>
                                <div class="w-25 input-group-append">
                                    <span class="w-100 input-group-text" id="basic-addon2">Miles</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-group mb-3">
                                <div class="w-25 input-group-prepend">
                                    <label class="w-100 input-group-text">Mode</label>
                                </div>
                                <select id="inputState" class="form-control shadow-none">
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
                        <div class="form-row">
                            <div class="input-group mb-3">
                                <div class="w-25 input-group-prepend">
                                    <label class="w-100 input-group-text">Country</label>
                                </div>
                                <select id="inputState" class="form-control shadow-none">
                                    <option value="aus">Australia</option>
                                    <option value="chn">China</option>
                                    <option value="fra">France</option>
                                    <option value="ind">India</option>
                                    <option value="omn">Oman</option>
                                    <option value="gbr">United Kingdom</option>
                                    <option value="usa">United States of America</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-dark shadow-none" type="submit">Calculate</button>
                        </div>
                    </form>
                </div>
                <div class="col">
                </div>
            </div>

        </div>
    </div>
</body>

</html>
