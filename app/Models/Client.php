<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['name', 'media_id', 'description'];

    public function logo(){
        return $this->belongsTo('App\Models\Media', 'media_id');
    }
}
