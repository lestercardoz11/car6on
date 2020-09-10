
<!-- Extends the layout of the app -->
@extends('layouts.app')

<!-- Calculator Section -->
@section('form-content')

    <!-- Title -->   
        <div class="row p-5">
            <div class="col">
            </div>
            <div class="col-6 bg-light mt-2 form-box">
                <nav class="navbar navbar-light bg-light justify-content-md-center">
                    <h1>Car<span style="color: #808080">6</span>on</h1>
                </nav>
            
                <!-- Form -->
                <form method="POST" action="/requestAPI" class="p-4">
                    @csrf

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
                    <div class="col-md-12 text-center">
                        <button class="btn btn-dark shadow-none" name="submit" type="submit">Calculate</button>
                    </div>
                </form>
            </div>
            <div class="col">
            </div>
        </div>

        <!-- Accessing Value Calculated -->
        @yield('calculate-content')

@endsection