<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footprint extends Model
{
    protected $fillable = [
        'activityDistance', 'activityMode', 'activityCountry', 'carbonFootprint',
    ];
}
