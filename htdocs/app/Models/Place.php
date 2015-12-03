<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
	protected $table = 'places';
    public static function createPlace($place_id,$name,$lat,$lng){
        $place = new Place();
        $place->name = $place_id;
        $place->lat = $lat;
        $place->lng = $lng;
        $place->address = $name;
        return $place->save();
    }
    public static function getPlaceById($place_id)
    {
        return Place::where('name',$place_id);
    }

}
