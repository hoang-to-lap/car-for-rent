<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
trait StorageImageTrait {
    public function storageTraitUpload($request , $fieldName ,$foderName){
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
    
            // Get the original file name
            $fileNameOriginal = $file->getClientOriginalName();
        
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            
            // Store the file in the public/car directory
            $filePath = $file->storeAs('public/'. $foderName .'/'.auth()->id(), $fileNameHash);
            $publicFilePath = Storage::url($filePath);
                $dataUploadTrait = [
                    'file_name' => $fileNameOriginal,
                    'file_path' => $publicFilePath
        
                ];
                return $dataUploadTrait;
        }
        return null;

        
    }
    public function storageTraitUploadMutiple($file ,$foderName){
        
         
    
            // Get the original file name
            $fileNameOriginal = $file->getClientOriginalName();
        
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            
            // Store the file in the public/car directory
            $filePath = $file->storeAs('public/'. $foderName .'/'.auth()->id(), $fileNameHash);
            $publicFilePath = Storage::url($filePath);
                $dataUploadTrait = [
                    'file_name' => $fileNameOriginal,
                    'file_path' => $publicFilePath
        
                ];
                return $dataUploadTrait;
        
    

        
    }
}