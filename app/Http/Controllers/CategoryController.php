<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    private CategoryService $categoryService;
 
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function categoryTB(Request $request)
    {
        try {
            //code...
            $result = $this->categoryService->categoryTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function categoryAdd(CategoryRequest $request)
    {
        try {
            //code...
            $this->categoryService->categoryAdd($request->validated());
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Category added successfully.'
        ));
    }
    //Using route model binding
    public function categoryGet(Category $category)
    {
        return json_encode($category);
    }

    public function categoryEdit(CategoryRequest $request, Category $category)
    {
       
        try {
            //code...
            $this->categoryService->categoryEdit($request->validated(),$category);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }

        return json_encode(array(
            'success' => true,
            'message' => 'Category edited successfully.'
        ));
    }

    public function categoryDelete(Category $category)
    {
        try {
            //code...
            $this->categoryService->categoryDelete($category);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Category has been deleted.'
        ));
    }
}
