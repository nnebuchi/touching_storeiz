<?php 
namespace App\Services;

use App\Models\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Image;

class FileService
{
    public static function upload($request, $fileName, $disk, $directory, $oldFile=null){

        // dd(config('filesystems.disks.'.$disk.'.root'));
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

            $file_size_mb = $uploadFile->getSize()/1000000;
            

            if(in_array($uploadFileExt, ['png', 'jpg', 'jpeg', 'gif']) &&  $file_size_mb > 1){
                
                $uploadFile = Image::make($uploadFile->path());
                $file_height = $uploadFile->height();
                $file_width = $uploadFile->width();
                
                    $new_file_height = ( 0.9 * $file_height) / $file_size_mb;
                    $new_file_width = ( 0.9 * $file_width) / $file_size_mb;
                
                $uploadFile->resize($new_file_width, $new_file_height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(config('filesystems.disks.'.$disk.'.root').'/'.$directory.'/'.$uploadFileToDb);
                
            }else{
                $uploadFile->storeAs($directory, $uploadFileToDb, $disk);
            }
            
            
            return $directory.'/'.$uploadFileToDb;
            
        }
    }

    public static function delete($filePath, $disk){
        return Storage::disk($disk)->delete($filePath);
        //  'success';
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