<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $table = 'portfolio_categories';

    protected $fillable = ['portfolio_id', 'category_id'];
}
