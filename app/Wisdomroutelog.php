<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisdomroutelog extends Model
{
    protected $table = 'wisdomroutelogs';
    protected $primaryKey = 'wisdomroute_id';
    protected $fillable = ['wisdom_origin','wisdom_destination','wisdom_distance','wisdom_duration','wisdom_id'];
}
