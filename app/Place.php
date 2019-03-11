<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

    protected $table = 'places';
    protected $primaryKey = 'place_id';
    protected $fillable = ['place_name_th','place_name_eng','place_address','place_detail','place_lat','place_lng','place_cover','place_tagline','place_publishby','place_status','place_reader','place_search','place_switch'];

    //Place Has One User
    public function user()
    {
        return $this->belongsTo('App\User','place_publishby');
    }

    //Place Has Many Place Photo
    public function placephotos()
    {
        return $this->hasMany('App\Placephoto','place_id');
    }

    //Place Has Many Place Review
    public function placereviews()
    {
        return $this->hasMany('App\Placereview','place_id');
    }

    public function searchableAs()
    {
        return 'place_name_th';
    }

}
