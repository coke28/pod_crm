<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLevelRequest;
use App\Models\UserLevel;
use App\Services\UserLevelService;
use DB;
use Illuminate\Http\Request;

class UserLevelController extends Controller
{
    private UserLevelService $userLevelService;

    public function __construct(UserLevelService $userLevelService)
    {
        $this->userLevelService = $userLevelService;
    }

    public function userLevelTB(Request $request)
    {
        try {
            //code...
            $result = $this->userLevelService->userLevelTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function userLevelAdd(UserLevelRequest $request)
    {
        try {
            //code...
            $this->userLevelService->userLevelAdd($request->validated());
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }

        return json_encode(array(
            'success' => true,
            'message' => 'User level added successfully.'
        ));
    }
    //Using route model binding
    public function userLevelGet(UserLevel $userLevel)
    {
        return json_encode($userLevel);
    }

    public function userLevelEdit(UserLevelRequest $request, UserLevel $userLevel)
    {
        //Get validated Data 
        try {
            //code...
            $this->userLevelService->userLevelEdit($request->validated(),$userLevel);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
       
        return json_encode(array(
            'success' => true,
            'message' => 'User level edited successfully.'
        ));
    }

    public function userLevelDelete(UserLevel $userLevel)
    {
        try {
            //code...
            $this->userLevelService->userLevelDelete($userLevel);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'User level has been deleted.'
        ));
    }
}

