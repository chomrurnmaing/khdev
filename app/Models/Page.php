<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['title', 'content', 'hero'];

    public function media(){
        return $this->belongsTo('App\Models\Media', 'hero');
    }
}
