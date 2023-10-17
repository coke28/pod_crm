<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueExceptCurrent implements Rule
{
    protected $table;
    protected $column;
    protected $model;

    public function __construct($table, $column, $model)
    {
        $this->table = $table;
        $this->column = $column;
        $this->model = $model;
    }

    public function passes($attribute, $value)
    {
        $query = "";
      
        if (!empty($this->model)) {
            // For edit case
            $query = DB::table($this->table)
                ->where($this->column, $value)
                ->where('id', '!=', $this->model->id)
                ->where('deleted','0')
                ->count();
        } else {
            // For add case
            $query = DB::table($this->table)
                ->where($this->column, $value)
                ->where('deleted','0')
                ->count();
        }

        if ($query > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function message()
    {
        return 'The :attribute is already in use.';
    }
}
