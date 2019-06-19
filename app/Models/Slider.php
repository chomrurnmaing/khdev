<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = ['title', 'except', 'content', 'media_id'];

    public function media(){
        return $this->belongsTo('App\Models\Media', 'media_id');
    }
}
