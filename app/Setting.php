<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'setting_id';
    protected $fillable = ['setting_systemname_th','setting_systemname_eng','setting_linetoken','setting_start_lat','setting_start_lng'];
}
