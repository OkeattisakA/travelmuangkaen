<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisdomreview extends Model
{
    protected $table = 'wisdomreviews';
    protected $primaryKey = 'wisdomreview_id';
    protected $fillable = ['wisdomreview_detail','wisdomreview_star','wisdomreview_status','wisdomreview_photo','wisdom_id','wisdomreview_by'];

    //Wisdom Review Has One Wisdom
    public function wisdom()
    {
        return $this->belongsTo('App\Wisdom','wisdom_id');
    }

    //Wisdom Review Has One User
    public function user()
    {
        return $this->belongsTo('App\User','wisdomreview_by');
    }
}
