<?php
/**
 * Created by PhpStorm.
 * User: Chomrurn
 * Date: 6/13/2019
 * Time: 11:27 AM
 */

namespace App\Utils;


use App\Models\Media;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use phpDocumentor\Reflection\Types\Self_;

class UploadFile
{
    public function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

    public static function uploadFiles($file)
    {
        $_self = new self;
        $i = 1;
        $path = 'uploads/' . date('Y') . '/' . date('m') . '/';
        $target_dir = public_path($path);
        $file_name = $file->getClientOriginalName();
        $file_extension = $file->getClientOriginalExtension();
        $original_file_name = str_replace( '.' . $file_extension, '', $file_name );
        $name_without_extension = $original_file_name;
        $slug = $_self->seoUrl( $name_without_extension );

        $dimensions = array(
            'default',
            [
                'width'     => 720,
                'height'    => 550
            ],
            [
                'width'     => 600,
                'height'    => 600
            ],
            [
                'width'     => 540,
                'height'    => 350
            ],
            [
                'width'     => 300,
                'height'    => 300
            ],
            [
                'width'     => 150,
                'height'    => 150
            ],
        );

        if(!File::isDirectory($target_dir)){
            File::makeDirectory($target_dir, 0777, true, true);
        }

        while(file_exists( $target_dir . $slug . '.' . $file_extension ))
        {
            $name_without_extension = (string) $original_file_name . ' (' . $i . ')';
            $slug = $_self->seoUrl( $name_without_extension );
            $i++;
        }

        if( $file->isValid() ){

            $image = Image::make( $file->getRealPath() );
            $image_file = '';

            foreach ($dimensions as $key => $value){
                if($value == 'default'){
                    $image->save($target_dir . $slug . '.' . $file_extension);
                } else {
                    $image->fit($value['width'], $value['height']);
                    $image->save($target_dir . $slug . '-' . $value['width'] . 'x' . $value['height'] . '.' . $file_extension);
                }
            }

            $image_file = Media::create([
                'name'      => $name_without_extension,
                'slug'      => $slug,
                'guid'      => $path . $slug . '.' . $file_extension,
                'mime_type' => $file->getClientMimeType(),
                'size'      => $file->getClientSize(),
            ]);

            return [
                'error'     => false,
                'data'      => $image_file
            ];

        }

        Flash::error( $file->getErrorMessage() );

        return [
            'error'     => true,
            'data'      => $file->getErrorMessage()
        ];
    }
}