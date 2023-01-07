<?php 
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public static function upload($request, $fileName, $disk, $directory, $oldFile=null){
        if ($request->hasFile($fileName)) {
            if(!is_null($oldFile)){
                if (Storage::disk($disk)->exists($oldFile) ) {
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
}