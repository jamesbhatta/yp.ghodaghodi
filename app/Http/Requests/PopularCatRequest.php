<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PopularCatRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'display_name' => '',
            'avatar' => 'required',
            'button_class' => 'required'
        ];
    }
}
