<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
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
            'name'        => 'required|unique:products,name,'.$this->id,
            'description' => 'required',
            'unit_price'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Dữ liệu không được để trống',
            'description.required' => 'Dữ liệu không được để trống',
            'unit_price.required'  => 'Dữ liệu không được để trống',
        ];
    }
}
