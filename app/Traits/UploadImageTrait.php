<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{
    public function uploadFile(Request $request, $inputName, $folderName, $oldImage=null){
        if($request->hasFile($inputName)){
            if($oldImage && Storage::disk('public')->exists($oldImage)){
                Storage::disk('public')->delete($oldImage);
            }
            return $request->file($inputName)->store($folderName , 'public');
        }
        return $oldImage ;

    }

    public function deleteFile(?string $path): void{
        if($path && Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }

    }



}