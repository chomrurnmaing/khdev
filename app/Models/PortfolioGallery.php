<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioGallery extends Model
{
    protected $table = 'portfolio_galleries';

    protected $fillable = ['portfolio_id', 'media_id'];
}
