<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placephoto extends Model
{
    protected $table = 'placephotos';
    protected $primaryKey = 'placephoto_id';
    protected $fillable = ['placephoto_path','place_id'];

    //Place Photo Has One Place
    public function place()
    {
        return $this->belongsTo('App\Place','place_id');
    }
}
