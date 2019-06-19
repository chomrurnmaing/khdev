<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceGallery extends Model
{
    protected $table = 'service_gallery';

    protected $fillable = ['service_id', 'media_id'];
}
