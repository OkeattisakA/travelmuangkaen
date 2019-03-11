<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placeroutelog extends Model
{
    protected $table = 'placeroutelogs';
    protected $primaryKey = 'placeroute_id';
    protected $fillable = ['place_origin','place_destination','place_distance','place_duration','place_id'];
}
