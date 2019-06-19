<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['title' , 'except', 'content', 'icon_id'];

    protected $appends = ['slug'];

    public function gallery(){
        return $this->belongsToMany('App\Models\Media', 'service_gallery');
    }

    public function faqs(){
        return $this->hasMany('App\Models\FAQ', 'service_id');
    }

    public function icon(){
        return $this->belongsTo('App\Models\Media', 'icon_id');
    }

    public function getSlugAttribute() {
        //Lower case everything
        $string = strtolower($this->title);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
}
