<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{
    public function uploadImage(Request $request, $inputName, $folderName, $oldImage=null){
        if($request->hasFile($inputName)){
            if($oldImage && Storage::disk('public')->exists($oldImage)){
                Storage::disk('public')->delete($oldImage);
            }
            return $request->file($inputName)->store($folderName , 'public');
        }
        return $oldImage ;

    }

}