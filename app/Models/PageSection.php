<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $table = 'page_sections';

    protected $fillable = ['page_id', 'title', 'tagline', 'content', 'media_id'];
}
