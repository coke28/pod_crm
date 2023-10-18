<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    private ProjectService $projectService;
 
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function projectTB(Request $request)
    {
        try {
            //code...
            $result = $this->projectService->projectTB($request);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //Using backend form validation and insertion
    public function projectAdd(ProjectRequest $request)
    {
        try {
            //code...
            $this->projectService->projectAdd($request->validated());
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Project added successfully.'
        ));
    }
    //Using route model binding
    public function projectGet(Project $project)
    {
        return json_encode($project);
    }

    public function projectEdit(ProjectRequest $request, Project $project)
    {
       
        try {
            //code...
            $this->projectService->projectEdit($request->validated(),$project);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }

        return json_encode(array(
            'success' => true,
            'message' => 'Project edited successfully.'
        ));
    }

    public function projectDelete(Project $project)
    {
        try {
            //code...
            $this->projectService->projectDelete($project);
        } catch (\Exception $exception) {
            //throw $ex;
            return response()->json(['error' => $exception->getMessage()],422);
        }
        return json_encode(array(
            'success' => true,
            'message' => 'Project has been deleted.'
        ));
    }
}
