<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route to main page
Route::get('/', function () {

    // Checks for cache data
    if (Cache::has('footprints')) {
        $carbonFootprint = Cache::get('footprints');
        return view('calculate', ['carbonFootprint' => $carbonFootprint]);
    } else {
        return view('form');
    }
});

//Route to retrieve API data
Route::post('/requestAPI', 'FootprintController@requestAPI');


