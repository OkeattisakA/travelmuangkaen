<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisdom extends Model
{
    protected $table = 'wisdoms';
    protected $primaryKey = 'wisdom_id';
    protected $fillable = ['wisdom_name_th','wisdom_name_eng','wisdom_address','wisdom_detail','wisdom_lat','wisdom_lng','wisdom_cover','wisdom_tagline','wisdom_publishby','wisdom_status','wisdom_reader','wisdom_search','wisdom_switch'];

    //Wisdom Has One User
    public function user()
    {
        return $this->belongsTo('App\User','wisdom_publishby');
    }

    //Wisdom Has Many Wisdom Photo
    public function wisdomphotos()
    {
        return $this->hasMany('App\Wisdomphoto','wisdom_id');
    }

    //Wisdom Has Many Wisdom Review
    public function wisdomreviews()
    {
        return $this->hasMany('App\Wisdomreview','wisdom_id');
    }
}
