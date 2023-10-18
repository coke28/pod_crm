<?php

namespace App\Http\Requests;

use App\Rules\UniqueExceptCurrent;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_name' => ['required',new UniqueExceptCurrent('projects', 'project_name', $this->route('project'))],
            'project_description' => 'sometimes',
            'map_file' => 'sometimes|file|mimes:jpg,jpeg,png|max:5000',
            'logo_file' => 'sometimes|file|mimes:jpg,jpeg,png|max:5000',
            'status' => 'required|in:1,0',
        ];
    }
}
