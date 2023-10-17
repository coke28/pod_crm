<?php

namespace App\Services;

use App\Models\Category;
use DB;
use Illuminate\Http\Request;

class CategoryService
{
    private CrmLogService $crmLogService;
 
    public function __construct(CrmLogService $crmLogService)
    {
        $this->crmLogService = $crmLogService;
    }

    public function categoryTB(Request $request)
    {

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'category_name',
            'category_description',
            'status',
            'created_at'
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

        $categories = DB::table('categories')
            ->selectRaw('categories.id
            ,category_name
            ,category_description
            ,CASE categories.status WHEN 0 THEN "INACTIVE" WHEN 1 THEN "ACTIVE" END as status
            ,created_at')
            ->where('deleted', '0');
        $categories = $categories->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('category_name', 'like', '%' . $search . '%')
                ->orWhere('category_description', 'like', '%' . $search . '%')
                ->orWhere(DB::raw('CASE categories.status WHEN 0 THEN "INACTIVE" WHEN 1 THEN "ACTIVE" END'), 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $categoryCount = $categories->count();
        $categories = $categories->offset($offset)
            ->limit($limit)
            ->get();



        return [
            'recordsTotal'    => $categoryCount,
            'recordsFiltered' => $categoryCount,
            'data'            => $categories,
        ];
    }
    public function categoryAdd($validatedData): void
    {
        $category = new Category();
        $category->category_name = $validatedData['category_name'];
        $category->category_description = $validatedData['category_description'];
        $category->status = $validatedData['status'];
        $category->save();

        $this->crmLogService->addCrmLog($category,"Manage Categories","categoryAdd");

        
    }
    public function categoryEdit($validatedData, Category $category): void
    {
        $category->category_name = $validatedData['category_name'];
        $category->category_description = $validatedData['category_description'];
        $category->status = $validatedData['status'];
        $category->save();

        $this->crmLogService->addCrmLog($category,"Manage Categories","categoryEdit");
        
    }
    public function categoryDelete(Category $category)
    {
        $category->deleted = "1";
        $category->save();

        $this->crmLogService->addCrmLog($category,"Manage Categories","categoryDelete");

    }

}
