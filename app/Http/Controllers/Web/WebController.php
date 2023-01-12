<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMobileNumber;
use App\Http\Requests\storeUserBooking;
use App\Http\Requests\StoreUserInformation;
use App\Http\Traits\SaveImageTrait;
use App\Mail\Confirmation;
use App\Models\Booking;
use App\Models\User;
use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    use SaveImageTrait;

    public function storeMobileNumber(StoreMobileNumber $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->update([
            'country_code'     => $request->country_code,
            'mobile_number'    => $request->mobile_number,
            'OTP_CODE'         => $request->OTP_CODE,
        ]);

        Auth::login($user);

        return redirect()->route('second_page');
    }

    public function storeUserInformation(StoreUserInformation $request)
    {
        $user = User::find(auth()->id());

        $user->update([
            'first_name'                => $request->first_name,
            'last_name'                 => $request->last_name,
            'date_of_birth'             => date('Y-m-d', strtotime($request->date_of_birth)),
            'place_of_birth'            => $request->place_of_birth,
            'gender'                    => $request->gender,
            'country_of_residency'      => $request->country_of_residency,
            'passport_no'               => $request->passport_no,
            'issue_date'                => date('Y-m-d', strtotime($request->issue_date)),
            'expiry_date'               => date('Y-m-d', strtotime($request->expiry_date)),
            'place_of_issue'            => $request->place_of_issue,
            'profession'                => $request->profession,
            'organization'              => $request->organization,
            'has_companion'             => $request->has_companion,
            'user_type'                 => '1',
        ]);


        Visa::create([
            'user_id'                   => $user->id,
            'arrival_date'              => date('Y-m-d', strtotime($request->arrival_date)),
            'visa_duration'             => $request->visa_duration,
            'visa_status'               => $request->visa_status,
            'passport_picture'          => $this->saveImage($request->file('passport_picture'), 'Images/Guest/Passport_Picture', 400, 400),
            'personal_picture'          => $this->saveImage($request->file('personal_picture'), 'Images/Guest/Personal_Picture', 400, 400),
        ]);

        if ($request->has_companion == '1') {
            $user = User::create([
                'first_name'                => $request->companion_first_name,
                'last_name'                 => $request->companion_last_name,
                'date_of_birth'             => $request->companion_date_of_birth,
                'place_of_birth'            => $request->companion_place_of_birth,
                'gender'                    => $request->companion_gender,
                'country_of_residency'      => $request->companion_country_of_residency,
                'passport_no'               => $request->companion_passport_no,
                'issue_date'                => $request->companion_issue_date,
                'expiry_date'               => $request->companion_expiry_date,
                'place_of_issue'            => $request->companion_place_of_issue,
                'profession'                => $request->companion_profession,
                'organization'              => $request->companion_organization,
                'has_companion'             => $request->companion_has_companion,
                'user_type'                 => '2',
            ]);

            Visa::create([
                'user_id'                   => $user->id,
                'arrival_date'              => $request->companion_arrival_date,
                'visa_duration'             => $request->companion_visa_duration,
                'visa_status'               => $request->companion_visa_status,
                'passport_picture'          => $this->saveImage($request->file('companion_passport_picture'), 'Images/Companion/Passport_Picture', 400, 400),
                'personal_picture'          => $this->saveImage($request->file('companion_personal_picture'), 'Images/Companion/Personal_Picture', 400, 400),
            ]);
        }

        return redirect()->route('third_page');
    }

    public function storeUserBooking(storeUserBooking $request)
    {
        Booking::create([
            'user_id'              => auth()->id(),
            'check_in_date'        => date('Y-m-d', strtotime($request->check_in_date)),
            'check_out_date'       => date('Y-m-d', strtotime($request->check_out_date)),
            'room_type'            => $request->room_type,
            'has_extra_night'      => $request->has_extra_night,
            'check_in_date_2'      => ($request->has_extra_night == '1') ? date('Y-m-d', strtotime($request->check_in_date_2)) : null,
            'check_out_date_2'     => ($request->has_extra_night == '1') ? date('Y-m-d', strtotime($request->check_out_date_2)) : null,
            'room_type_2'          => ($request->has_extra_night == '1') ? $request->room_type_2 : null,
        ]);

        return redirect()->route('getUserInformation', auth()->id());
    }

    public function getUserInformation($id)
    {
        $user = User::find($id);
        return view('Web.fourth_page', compact('user'));
    }

    public function confirmVisa($id)
    {
        $user = User::find($id);
        $visa = Visa::where('user_id', $id)->first();
        $visa->update(['confirmed', '2']);
        Mail::to($user->email)->send(new Confirmation());
        return redirect()->route('final_page');
    }
}
