<?php

namespace App\Http\Controllers;

use App\Footprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

use GuzzleHttp\Client;

class FootprintController extends Controller
{
    public function requestAPI(Request $request)
    {
        //Retreive Form Data
        $activityDistance = $request->input('activityDistance');
        $activityCountry = $request->input('activityCountry');
        $activityMode = $request->input('activityMode');

        $client = new Client();

        //API url
        $url = "https://api.triptocarbon.xyz/v1/footprint?activity=" . $activityDistance . "&activityType=miles&country=" . $activityCountry . "&mode=" . $activityMode;

        //API response
        $response = $client->request('GET', $url);
        $body = $response->getBody()->getContents();

        //Get contents in json format
        $json = json_decode($body, true);
        $carbonFootprint = $json['carbonFootprint'];

        $seconds = 60 * 60 * 24; //Cache data for 1 day
        Cache::put('footprints', $carbonFootprint, $seconds); //Put data into cache 

        //Store data into database
        $this->store($request, $carbonFootprint);

        return view('calculate', ['carbonFootprint' => $carbonFootprint]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request, $carbonFootprint) : void
    {
        //Validate data to be inserted into database
        $this->validate($request, [
            'activityDistance' => 'required',
            'activityCountry' => 'required',
            'activityMode' => 'required',
        ]);

        //Insert data into database
        $footprint = new Footprint([
            'activityDistance' => $request->input('activityDistance'),
            'activityCountry' => $request->input('activityCountry'),
            'activityMode' => $request->input('activityMode'),
            'carbonFootprint' => $carbonFootprint
        ]);
        $footprint->save(); //Save data into database

        return;
    }
}
