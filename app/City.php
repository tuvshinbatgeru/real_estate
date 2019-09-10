<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function pois()
    {
    	return $this->belongsToMany('App\Poi', 'district_poi', 'district_id', 'poi_id');
    }
}
