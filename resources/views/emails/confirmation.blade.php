@component('mail::message')
    # Complete Information Content

    Well Done
    Your information has been submitted successfully
    You will receive in coming day invitation email with instructions from RS4IT to book your flight.
    See you soon


    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
