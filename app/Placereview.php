<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placereview extends Model
{
    protected $table = 'placereviews';
    protected $primaryKey = 'placereview_id';
    protected $fillable = ['placereview_detail','placereview_star','placereview_status','placereview_photo','place_id','placereview_by'];

    //Place Review Has One Place
    public function place()
    {
        return $this->belongsTo('App\Place','place_id');
    }

    //Place Review Has One User
    public function user()
    {
        return $this->belongsTo('App\User','placereview_by');
    }
}
