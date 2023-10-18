<?php

namespace App\Services;


use App\Models\Image;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\throwException;

class ImageService
{
    private CrmLogService $crmLogService;

    public function __construct(CrmLogService $crmLogService)
    {
        $this->crmLogService = $crmLogService;
    }

    public function imageTB(Request $request)
    {

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'images.id',
            'images.image_name',
            'images.image_path',
            'images.category_name',
            'projects.project_name',
            'images.status',
            'images.created_at'
        );
        // offset and limit
        $offset = 0;
        $limit = 10;
        if (isset($request->length)) {
            $offset = isset($request->start) ? $request->start : $offset;
            $limit = isset($request->length) ? $request->length : $limit;
        }

        // searchText
        $search = '';
        if (isset($request->search) && isset($request->search['value'])) {
            $search = $request->search['value'];
        }

        // ordering
        $sortIndex = 0;
        $sortOrder = 'desc';
        if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['column'])) {
            $sortIndex = $request->order[0]['column'];
        }
        if (isset($request->order) && isset($request->order[0]) && isset($request->order[0]['dir'])) {
            $sortOrder = $request->order[0]['dir'];
        }

        $images = DB::table('images')
            ->join('categories', 'images.category_id', '=', 'categories.id')
            ->leftjoin('projects', 'images.project_id', '=', 'projects.id')
            ->selectRaw('images.id
            ,images.image_name
            ,images.image_path
            ,categories.category_name
            ,projects.project_name
            ,CASE images.status WHEN 0 THEN "INACTIVE" WHEN 1 THEN "ACTIVE" END as status
            ,images.created_at')
            ->where('images.deleted', '0');

        $images = $images->where(function ($query) use ($search) {
            return $query->where('images.id', 'like', '%' . $search . '%')
                ->orWhere('images.image_name', 'like', '%' . $search . '%')
                ->orWhere('categories.category_name', 'like', '%' . $search . '%')
                ->orWhere('projects.project_name', 'like', '%' . $search . '%')
                ->orWhere(DB::raw('CASE images.status WHEN 0 THEN "INACTIVE" WHEN 1 THEN "ACTIVE" END'), 'like', '%' . $search . '%')
                ->orWhere('images.created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $imageCount = $images->count();
        $images = $images->offset($offset)
            ->limit($limit)
            ->get();



        return [
            'recordsTotal'    => $imageCount,
            'recordsFiltered' => $imageCount,
            'data'            => $images,
        ];
    }
    public function imageAdd($validatedData): void
    {

        if (empty($validatedData['file'])) {
            throw new \Exception('File is empty');
        }

        if (!$validatedData['file']->isValid()) {
            throw new \Exception('File is not valid');
        }

        $filename = now()->format('Y-m-d_H-i-s') . '_' . $validatedData['file']->getClientOriginalName();
        // Store the file to the specified disk and directory
        $validatedData['file']->storeAs('/', $filename, 'public_images');
        $image = new Image();
        $image->image_name = $filename;
        $image->image_path = 'storage/images/' . $filename;
        $image->category_id = $validatedData['category_id'];
        $image->project_id = "0";
        $image->save();

        $this->crmLogService->addCrmLog($image, "Manage Images", "imageAdd");
    }

    public function imageDelete(Image $image)
    {
        if (Storage::disk('public_images')->exists($image->image_name)) {
            Storage::disk('public_images')->delete($image->image_name);
            $image->deleted = "1";
            $image->save();
            $this->crmLogService->addCrmLog($image, "Manage Images", "imageDelete");
        }else{
            throw new \Exception('File not found');
        }
    }
}
