<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
    protected $table = 'point_of_interests';
	protected $fillable = ['place_name', 'longitude', 'latitude', 'searchable'];

	public function districts()
    {
        return $this->belongsToMany('App\City', 'district_poi', 'poi_id', 'district_id');
    }
}
