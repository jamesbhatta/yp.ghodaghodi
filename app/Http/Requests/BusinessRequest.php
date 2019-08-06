<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
            'name' => 'required',
            'business_type' => 'required',
            'account_type' => 'required',
            'category_id' => 'required',
            'expires_at' => '',
            'city_id' => 'required',
            'address' => 'required',
            'contact_one' => '',
            'contact_two' => '',
            'email' => 'required',
            'website' => '',
            'map_id' => '',
            'facebook_link' => '',
            'twitter_link' => '',
            'google_link' => '',
            'description_title' => '',
            'description' => '',
            'services_title' => '',
            'services' => '',
            'profile_pic' => 'image',
            'cover_pic' => 'image',
        ];
    }
}
