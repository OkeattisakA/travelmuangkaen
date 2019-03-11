<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisdomphoto extends Model
{
    protected $table = 'wisdomphotos';
    protected $primaryKey = 'wisdomphoto_id';
    protected $fillable = ['wisdomphoto_path','wisdom_id'];

    //Wisdom Photo Has One Wisdom
    public function wisdom()
    {
        return $this->belongsTo('App\Wisdom','wisdom_id');
    }
}
