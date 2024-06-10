<?php

namespace App\Http\Controllers\Backend;

use App\Models\temporaryImages;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class DeleteTemporaryImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $temporaryImage = temporaryImages::where('folder', request()->getContent())->first();

        if($temporaryImage){
            Storage::deleteDirectory('/public/images/tmp/'.$temporaryImage->folder);
            $temporaryImage->delete();
        }

        return response()->noContent();
    }
}
