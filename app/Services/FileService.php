<?php 
namespace App\Services;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public static function upload($request, $fileName, $disk, $directory, $oldFile=null){
        if ($request->hasFile($fileName)) {

            if(!is_null($oldFile)){
                if (Storage::disk($disk)->exists($oldFile)) {
                    Storage::disk($disk)->delete($oldFile);
                }  
            }
            
            $uploadFile       = $request->$fileName;
            $uploadFileName   = $uploadFile->getClientOriginalName();
            $uploadFileExt    = $uploadFile->getClientOriginalExtension();
            $uploadFileName   = pathinfo(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '_', $uploadFileName)), PATHINFO_FILENAME);
            $uploadFileToDb   = $uploadFileName . '_' . time() . '.' . $uploadFileExt;
            $uploadFile->storeAs($directory, $uploadFileToDb, $disk);
            
            return $directory.'/'.$uploadFileToDb;
            
        }
    }

    public static function addMedia(String $file){

        // explode photo name to get file format
        $get_file_format = explode('.', $file);
        // get last element from exploded file name
        $file_format = $get_file_format[count($get_file_format)-1];

        $media = new File;
        $media->file = $file;
        $media->format = $file_format;
        $media->save();

        return $media;
    }
    
}