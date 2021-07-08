<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait UploadImages {
    function getPastryImageStorageLocation() {
        return "storage/photos/pastry/";
    }

    function uploadImages($image) {
        // dd($image);
        $storageLocnsArray = [];
        $filename = "fullsize-" . time() . "-" . bin2hex(openssl_random_pseudo_bytes(16)) . "."  . $image->getClientOriginalExtension();
        $storage_path = "app/" . $this->getPastryImageStorageLocation() . $filename;
        $image->storeAs($this->getPastryImageStorageLocation(), $filename);
        Image::make(storage_path($storage_path))->resize(900, 600)->save();

        $storageLocnsArray["storage_path"] = $storage_path;
        $storageLocnsArray["saved_image_name"] = $filename;

        return $storageLocnsArray;
    }
}