<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobPostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'roles' => 'required',
            'category' => 'required',
            'position' => 'required|in:Lead,Senior,Intermediate,Junior,Entry-level',
            'address' => 'required',
            // 'type' => 'required|in:fulltime,part-time,contract',
            'type' => [
                'required',
                Rule::in(['fulltime', 'part-time', 'contract'])
            ],
            'status' => 'required|in:1,0',
            'last_date' => 'required',
        ];
    }
}
