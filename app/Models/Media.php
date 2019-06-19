<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = ['name', 'slug', 'guid', 'mime_type', 'size'];

    public function getImageUrl($size = '') {
        $guid = '/' . $this->guid;
        if ($size == ''){
            return $guid;
        } else {
            $size = '-' . $size . '.';
            $image_path = str_replace('.', $size, $guid);

            if(file_exists(public_path() . $image_path)){
                return $image_path;
            } else {
                return $guid;
            }
        }
    }
}
