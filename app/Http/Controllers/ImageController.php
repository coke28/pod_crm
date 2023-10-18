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
    public function imageAdd(ImageRequest $request)
    {
        try {
            //code...

            $validatedData = $request->validated();
            if(!empty($validatedData['file'])){
                if($validatedData['file']->isValid()) {
                    $filename = now()->format('Y-m-d_H-i-s') . '_' .$validatedData['file']->getClientOriginalName();
                    // Store the file to the specified disk and directory
                    $validatedData['file']->storeAs('/', $filename, 'public_images');
                    
                    $image = new Image();
                    $image->image_name = $filename;
                    $image->image_path = 'storage/images/' . $filename;
                    $image->category_id = $validatedData['category_id'];
                    $image->project_id = "0";
                    $image->save();
                }
            }
            // if(!empty($request->file)){
            //     if($request->file('file')->isValid()) {
            //         $filename = now()->format('Y-m-d_H-i-s') . '_' .$request->file('file')->getClientOriginalName();
            //         // Store the file to the specified disk and directory
            //         $request->file('file')->storeAs('/', $filename, 'public_images');
                    
            //         $image = new Image();
            //         $image->image_name = $filename;
            //         $image->image_path = 'storage/images/' . $filename;
            //         $image->category_id = $request->category_id;
            //         $image->project_id = "0";
            //         $image->save();
            //     }
            // }


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
