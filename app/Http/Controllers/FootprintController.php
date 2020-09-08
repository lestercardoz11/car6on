<?php

namespace App\Http\Controllers;

use App\Footprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Redirect;

use GuzzleHttp\Client;

class FootprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Retreive Form Data
        $activityDistance = $request->input('activityDistance');
        $activityCountry = $request->input('activityCountry');
        $activityMode = $request->input('activityMode');

        $client = new Client();

        //API url
        $url = "https://api.triptocarbon.xyz/v1/footprint?activity=" . $activityDistance . "&activityType=miles&country=" . $activityCountry . "&mode=" . $activityMode;

        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $json = json_decode($body, true);
        $carbonFootprint = $json['carbonFootprint'];

        //Proceed to database
        return $this->store($request, $carbonFootprint);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request, $carbonFootprint)
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
        $footprint->save();

        //Refresh with the calculated number
        return redirect('/')->with('message',$carbonFootprint);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
