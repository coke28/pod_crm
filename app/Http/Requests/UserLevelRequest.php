<?php

namespace App\Http\Requests;

use App\Rules\UniqueExceptCurrent;
use Illuminate\Foundation\Http\FormRequest;

class UserLevelRequest extends FormRequest
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
            'name' => ['required','string', new UniqueExceptCurrent('user_levels', 'name', $this->route('userLevel'))],
            'n1_crm' => 'in:0,1',
            'n1_tools' => 'in:0,1',
            'n2_users' => 'in:0,1',
            'n2_user_roles' => 'in:0,1',
            'n2_projects' => 'in:0,1',
            'n2_images' => 'in:0,1',
            'n2_categories' => 'in:0,1',
            'n2_dashboard' => 'in:0,1',
            'n2_forms' => 'in:0,1',
            'n2_crm_logs' => 'in:0,1',
        ];
    }
}
