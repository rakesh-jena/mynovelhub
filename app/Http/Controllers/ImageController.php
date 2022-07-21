<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class ImageController extends Controller
{
    public function upload(Request $request){
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $jpg_url = "original-".time().".jpg";
        $path = 'images/temp/'.$jpg_url;
        
        $img = file_put_contents($path, $image_base64);

        return response()->json( $jpg_url  );
    }
}
