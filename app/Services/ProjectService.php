<?php

namespace App\Services;

use App\Models\Project;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectService
{
    private CrmLogService $crmLogService;

    public function __construct(CrmLogService $crmLogService)
    {
        $this->crmLogService = $crmLogService;
    }

    public function projectTB(Request $request)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');

        $tableColumns = array(
            'id',
            'project_name',
            'project_description',
            'logo_path',
            'map_path',
            'status',
            'created_at',
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

        $projects = DB::table('projects')->selectRaw('
            id,
            project_name,
            project_description,
            logo_path,
            map_path,
            CASE status WHEN 0 THEN "DISABLED" WHEN 1 THEN "ACTIVE" END as status,
            created_at
        ')
        ->where('deleted','0');

        $projects = $projects->where(function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('project_name', 'like', '%' . $search . '%')
                ->orWhere('project_description', 'like', '%' . $search . '%')
                ->orWhere(DB::raw('CASE status WHEN 0 THEN "INACTIVE" WHEN 1 THEN "ACTIVE" END'), 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%');
        })
            ->orderBy($tableColumns[$sortIndex], $sortOrder);
        $projectCount = $projects->count();
        $projects = $projects->offset($offset)
            ->limit($limit)
            ->get();



        $result = [
            'recordsTotal'    => $projectCount,
            'recordsFiltered' => $projectCount,
            'data'            => $projects,
        ];

        return $result;
    }
    public function projectAdd($validatedData): void
    {
        $project = new Project();
        if (!empty($validatedData['logo_file'])) {

            if (!$validatedData['logo_file']->isValid()) {
                throw new \Exception('Logo file is not valid');
            }
            $logo_path = $validatedData['logo_file']->store('/', 'public_logos');
            $project->logo_name = $logo_path;
            $project->logo_path = 'storage/logos/' . $logo_path;
        }
        if (!empty($validatedData['map_file'])) {
            if (!$validatedData['map_file']->isValid()) {
                throw new \Exception('Map file is not valid');
            }
            $map_path = $validatedData['map_file']->store('/', 'public_maps');
            $project->map_name = $map_path;
            $project->map_path = 'storage/maps/' . $map_path;
        }
        $project->project_name = $validatedData['project_name'];
        $project->project_description = $validatedData['project_description'];
        $project->status = $validatedData['status'];
        $project->save();

        $this->crmLogService->addCrmLog($project, "Manage Projects", "projectAdd");
    }
    public function projectEdit($validatedData, Project $project): void
    {
        if (!empty($validatedData['logo_file'])) {

            if (!$validatedData['logo_file']->isValid()) {
                throw new \Exception('Logo file is not valid');
            }
            if (Storage::disk('public_logos')->exists($project->logo_name)) {
                Storage::disk('public_logos')->delete($project->logo_name);
                
            }
            $logo_path = $validatedData['logo_file']->store('/', 'public_logos');
            $project->logo_name = $logo_path;
            $project->logo_path = 'storage/logos/' . $logo_path;
           
        }
        if (!empty($validatedData['map_file'])) {
            if (!$validatedData['map_file']->isValid()) {
                throw new \Exception('Map file is not valid');
            }
            if(Storage::disk('public_maps')->exists($project->map_name)){
                Storage::disk('public_maps')->delete($project->map_name);
            }
            $map_path = $validatedData['map_file']->store('/', 'public_maps');
            $project->map_name = $map_path;
            $project->map_path = 'storage/maps/' . $map_path;
        }

        $project->project_name = $validatedData['project_name'];
        $project->project_description = $validatedData['project_description'];
        $project->status = $validatedData['status'];
        $project->save();

        $this->crmLogService->addCrmLog($project, "Manage Projects", "projectEdit");
    }
    public function projectDelete(Project $project)
    {
        if (Storage::disk('public_logos')->exists($project->logo_name) && Storage::disk('public_maps')->exists($project->map_name)) {
            Storage::disk('public_logos')->delete($project->logo_name);
            Storage::disk('public_maps')->delete($project->map_name);
           
        }
        $project->deleted = "1";
        $project->save();
        $this->crmLogService->addCrmLog($project, "Manage Projects", "projectDelete");
    }
}
