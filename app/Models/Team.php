<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['first_name', 'last_name', 'position_id', 'avatar_id', 'facebook', 'linkedin', 'gmail', 'twitter'];

    protected $appends = ['full_name'];

    public function avatar(){
        return $this->belongsTo('App\Models\Media', 'avatar_id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function position(){
        return $this->belongsTo('App\Models\Position', 'position_id');
    }
}
