<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolePermissionValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'name'=> 'required|unique:roles,name',
          'permission_id'=>'required'
        ];
    }
    public function messages(){
       return  [
            'name.required'=>"Roles must be assignes",
            'name.unique'=>"Roles already exists",
            'permission_id.required'=>"Please select at least 1 Permission"

        ];
    }
}
