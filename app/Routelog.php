<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routelog extends Model
{
    protected $table = 'routelogs';
    protected $primaryKey = 'id';
    protected $fillable = ['origin','destination','distance','duration'];

}
