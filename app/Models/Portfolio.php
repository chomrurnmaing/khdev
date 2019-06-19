<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';

    protected $fillable = ['title', 'content', 'date', 'client_id', 'featured_image'];

    protected $appends = ['all_categories', 'all_skills'];

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'portfolio_categories');
    }

    public function skills(){
        return $this->belongsToMany('App\Models\Skill', 'portfolio_skills');
    }

    public function featuredImage(){
        return $this->belongsTo('App\Models\Media', 'featured_image');
    }

    public function gallery(){
        return $this->belongsToMany('App\Models\Media', 'galleries');
    }

    public function getAllCategoriesAttribute(){

        $categories = '';

        foreach ($this->categories as $key => $value){
            $categories = $categories . ' ' . $value->slug;
        }

        return $categories;
    }

    public function getAllSkillsAttribute(){
        $str_skills = '';

        foreach ($this->skills as $key => $value){
            if($str_skills == '')
                $str_skills = $value->title;
            else
                $str_skills = $str_skills . ', ' . $value->title;
        }

        return $str_skills;
    }
}
