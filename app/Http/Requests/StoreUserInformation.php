<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserInformation extends FormRequest
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

            ## Guest Data
            'first_name'                => 'required|string',
            'last_name'                 => 'required|string',
            'date_of_birth'             => 'required|date|before_or_equal:today',
            'place_of_birth'            => 'required|string',
            'gender'                    => 'required|integer',
            'country_of_residency'      => 'required|string',
            'passport_no'               => 'required|string|min:6',
            'issue_date'                => 'required|date|before_or_equal:today',
            'expiry_date'               => 'required|date|after_or_equal:issue_date',
            'place_of_issue'            => 'required|string',
            'profession'                => 'required|string',
            'organization'              => 'required|string',
            'has_companion'             => 'required|integer',
            'arrival_date'              => 'required|date|after_or_equal:today',
            'visa_duration'             => 'required|integer',
            'visa_status'               => 'required|integer',
            'passport_picture'          => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            'personal_picture'          => 'required|image|mimes:jpg,jpeg,png,gif,webp',

            ## Companion Data
            'companion_first_name'                => 'required_if:has_companion,1|string',
            'companion_last_name'                 => 'required_if:has_companion,1|string',
            'companion_date_of_birth'             => 'required_if:has_companion,1|date|before_or_equal:today',
            'companion_place_of_birth'            => 'required_if:has_companion,1|string',
            'companion_gender'                    => 'required_if:has_companion,1|integer',
            'companion_country_of_residency'      => 'required_if:has_companion,1|string',
            'companion_passport_no'               => 'required_if:has_companion,1|string|min:6',
            'companion_issue_date'                => 'required_if:has_companion,1|date|before_or_equal:today',
            'companion_expiry_date'               => 'required_if:has_companion,1|date|after_or_equal:today',
            'companion_place_of_issue'            => 'required_if:has_companion,1|string',
            'companion_profession'                => 'required_if:has_companion,1|string',
            'companion_organization'              => 'required_if:has_companion,1|string',
            'companion_arrival_date'              => 'required_if:has_companion,1|date|after_or_equal:today',
            'companion_visa_duration'             => 'required_if:has_companion,1|integer',
            'companion_visa_status'               => 'required_if:has_companion,1|integer',
            'companion_passport_picture'          => 'required_if:has_companion,1|image|mimes:jpg,jpeg,png,gif,webp',
            'companion_personal_picture'          => 'required_if:has_companion,1|image|mimes:jpg,jpeg,png,gif,webp',
        ];
    }
}
