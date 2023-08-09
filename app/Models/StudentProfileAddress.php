<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfileAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_profile_id',
        'state_id',
        'landmark',
        'city_id',
        'country_id',
        'address',
        'town',
        'pin',
        'type',
        'premise_name',
        'plot_no',
        'locality',
        'sub_locality',
        'village',
        'post_office',
        'police_station_id',
        'police_station'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    // public function police_station()
    // {
    //     return $this->belongsTo(PoliceStation::class,'police_station_id');
    // }
}
