<?php

namespace App\Http\Controllers\Backend;

use App\Models\temporaryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UploadTemporaryImageController extends Controller
{
    public function __invoke(Request $request)
    {
       
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = uniqid('image-', true);
            $image->storeAs('/public/images/tmp/' . $folder, $fileName);

            temporaryImages::create([
                'folder' => $folder,
                'file' => $fileName,
            ]);
            return $folder;
        }
        return '';
    }
}
