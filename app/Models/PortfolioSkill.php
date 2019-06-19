<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioSkill extends Model
{
    protected $table = 'portfolio_skills';

    protected $fillable = ['portfolio_id', 'skill_id'];
}
