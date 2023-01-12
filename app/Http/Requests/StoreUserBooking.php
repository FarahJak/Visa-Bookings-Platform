<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserBooking extends FormRequest
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
            'check_in_date'        => 'required|date|after_or_equal:today',
            'check_out_date'       => 'required|date|after_or_equal:today',
            'room_type'            => 'required|integer',
            'has_extra_night'      => 'required|integer',
            'check_in_date_2'      => 'required_if:has_extra_night,1|date|after_or_equal:today',
            'check_out_date_2'     => 'required_if:has_extra_night,1|date|after_or_equal:today',
            'room_type_2'          => 'required_if:has_extra_night,1|integer',
        ];
    }
}
