<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    protected $fillable = ['name', 'media_id', 'description'];

    public function logo(){
        return $this->belongsTo('App\Models\Media', 'media_id');
    }
}
