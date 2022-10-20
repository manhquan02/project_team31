<?php
namespace App\Http\Services;

class UploadImgService {
    public static function uploadImg($file, $prefix, $type = null){

        if(!isset($file))
        {
           return null; 
        } 
        $ext = $file->extension();
        $file_name = time().'-'.rand(10,100).'user.'.$ext;
        if(!$type){
            $filePath = $file->move(public_path($prefix), $file_name);
        }
        else{
            $filePath = $file->move(public_path($type.'/'. $prefix), $file_name);
        }
            // $file_name='kkk.jpg';
        return $file_name;
        
        
    }
}