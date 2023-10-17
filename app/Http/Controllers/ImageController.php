<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    private ImageService $imageService;
 
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function imageTB(Request $request)
    {
        try {
            //code...
            $result = $this->imageService->imageTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function imageAdd(Request $request)
    {
        try {
            //code...
            if(!empty($request->file)){
                Storage::put('avatars/1', $request->file);
            }
          
            
            // $this->imageService->imageAdd($request->validated());
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Image added successfully.'
        ));
    }


    public function imageDelete(Image $image)
    {
        try {
            //code...
            $this->imageService->imageDelete($image);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Image has been deleted.'
        ));
    }

}
