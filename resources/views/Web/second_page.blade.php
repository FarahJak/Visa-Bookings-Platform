<!doctype html>
<html lang="en">

<head>
    <title>:: Iconic :: Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/vendor/charts-c3/plugin.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/vendor/dropify/css/dropify.min.css') }}">

    <!-- MAIN Project CSS file -->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css/h-menu.css') }}">

    <link rel="stylesheet"
        href="{{ URL::asset('Dashboard/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

    {{-- <style>
        .companion-data {
            display: none;
        }
    </style> --}}
</head>

<body data-theme="light" class="font-nunito h_menu">

    <div id="wrapper" class="theme-cyan">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="assets/images/logo-icon.svg" width="48" height="48" alt="Iconic">
                </div>
                <p>Please wait...</p>
            </div>
        </div>

        <!-- mani page content body part -->
        <div id="main-content">
            <div class="container">
                <div class="block-header">
                    <div class="row">
                        <div class="card">
                            <div class="body">
                                <form class="form-auth-small" action="{{ route('storeUserInformation') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- The Data of The Guest --}}
                                    <div class="card">
                                        <div class="header">
                                            <p>
                                            <h3>Guest Data</h3>
                                            <h5>Please fill below information per to passport</h5>
                                            </p>
                                            <hr>
                                        </div>
                                        <div class="body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control" name="first_name"
                                                            required
                                                            oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
                                                        @if ($errors->has('first_name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('first_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control" name="last_name"
                                                            required
                                                            oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
                                                        @if ($errors->has('last_name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('last_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Date Of Birth</label>
                                                    <span class="text-danger">*</span>
                                                    <div class="input-group date datepicker" data-date-autoclose="true"
                                                        data-provide="datepicker">
                                                        <input type="text" class="form-control" name="date_of_birth"
                                                            required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button"><i
                                                                    class="fa fa-calendar"></i></button>
                                                        </div>
                                                        @if ($errors->has('date_of_birth'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Place Of Birth</label>
                                                        <span class="text-danger">*</span>
                                                        @php
                                                            $countries = App\Models\Country::all();
                                                        @endphp
                                                        <select class="form-control show-tick" name="place_of_birth"
                                                            required>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->name }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick" name="gender" required>
                                                            <option value="1">Female</option>
                                                            <option value="2">Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Country of Residency</label>
                                                        <span class="text-danger">*</span>
                                                        @php
                                                            $countries = App\Models\Country::all();
                                                        @endphp
                                                        <select class="form-control show-tick"
                                                            name="country_of_residency" required>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->name }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Passport No</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control" name="passport_no"
                                                            min="6" required
                                                            onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)">
                                                        @if ($errors->has('passport_no'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('passport_no') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Place of issue</label>
                                                        <span class="text-danger">*</span>
                                                        @php
                                                            $countries = App\Models\Country::all();
                                                        @endphp
                                                        <select class="form-control show-tick" name="place_of_issue"
                                                            required>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->name }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Issue date</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="input-group date datepicker"
                                                            data-date-autoclose="true" data-provide="datepicker">
                                                            <input type="text" class="form-control"
                                                                name="issue_date" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><i
                                                                        class="fa fa-calendar"></i></button>
                                                            </div>
                                                            @if ($errors->has('issue_date'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('issue_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Expiry date</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="input-group date datepicker_past"
                                                            data-date-autoclose="true" data-provide="datepicker">
                                                            <input type="text" class="form-control"
                                                                name="expiry_date" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><i
                                                                        class="fa fa-calendar"></i></button>
                                                            </div>
                                                            @if ($errors->has('expiry_date'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('expiry_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Profession</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control" name="profession"
                                                            min="6" required>
                                                        @if ($errors->has('profession'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('profession') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Organization</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control"
                                                            name="organization" min="6" required>
                                                        @if ($errors->has('organization'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('organization') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Arrival date</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="input-group date datepicker_past"
                                                            data-date-autoclose="true" data-provide="datepicker">
                                                            <input type="text" class="form-control"
                                                                name="arrival_date" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><i
                                                                        class="fa fa-calendar"></i></button>
                                                            </div>
                                                            @if ($errors->has('arrival_date'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('arrival_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Visa duration</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick 1-90"
                                                            name="visa_duration" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Visa status</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick" name="visa_status"
                                                            required>
                                                            <option value="1">Multiple</option>
                                                            <option value="2">Single</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <p>
                                            <h5>Please upload require documents for VISA requirement </h5>
                                            <span class="text-danger">
                                                (Note: picture most meet requirement in order to apply for VISA) <br>
                                            </span>
                                            </p>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Passport picture</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="file" class="dropify"
                                                                    name="passport_picture" required>
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('passport_picture'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('passport_picture') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Personal picture</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="file" class="dropify"
                                                                    name="personal_picture" required>
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('personal_picture'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('personal_picture') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Are you Traveling with companion (plus one)?</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick" name="has_companion"
                                                            id="has_companion" required>
                                                            <option value="1">Yes</option>
                                                            <option value="2">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- The Data Of The Companion --}}
                                    <div class="card companion-data">
                                        <div class="header">
                                            <p>
                                            <h3>Companion Data</h3>
                                            </p>
                                            <hr>
                                        </div>
                                        <div class="body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group" id="diva">
                                                        <label>First Name</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control"
                                                            name="companion_first_name" required
                                                            oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
                                                        @if ($errors->has('companion_first_name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('companion_first_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divb">
                                                        <label>Last Name</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control"
                                                            name="companion_last_name" required
                                                            oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
                                                        @if ($errors->has('companion_last_name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('companion_last_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Date Of Birth</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="input-group date datepicker"
                                                            data-date-autoclose="true" data-provide="datepicker">
                                                            <input type="text" class="form-control" id="divc"
                                                                name="companion_date_of_birth">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><i
                                                                        class="fa fa-calendar"></i></button>
                                                            </div>
                                                            @if ($errors->has('companion_date_of_birth'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('companion_date_of_birth') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divd">
                                                        <label>Place Of Birth</label>
                                                        <span class="text-danger">*</span>
                                                        @php
                                                            $countries = App\Models\Country::all();
                                                        @endphp
                                                        <select class="form-control show-tick"
                                                            name="companion_place_of_birth" required>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->name }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group" id="dive">
                                                        <label>Gender</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick" name="companion_gender"
                                                            required>
                                                            <option value="1">Female</option>
                                                            <option value="2">Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divf">
                                                        <label>Country of Residency</label>
                                                        <span class="text-danger">*</span>
                                                        @php
                                                            $countries = App\Models\Country::all();
                                                        @endphp
                                                        <select class="form-control show-tick"
                                                            name="companion_country_of_residency" required>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->name }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group" id="divg">
                                                        <label>Passport No</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control"
                                                            name="companion_passport_no" min="6" required
                                                            onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)">
                                                        @if ($errors->has('companion_passport_no'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('companion_passport_no') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divh">
                                                        <label>Place of issue</label>
                                                        <span class="text-danger">*</span>
                                                        @php
                                                            $countries = App\Models\Country::all();
                                                        @endphp
                                                        <select class="form-control show-tick"
                                                            name="companion_place_of_issue" required>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->name }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group" id="divi">
                                                        <label>Issue date</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="input-group date datepicker"
                                                            data-date-autoclose="true" data-provide="datepicker">
                                                            <input type="text" class="form-control"
                                                                name="companion_issue_date">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><i
                                                                        class="fa fa-calendar"></i></button>
                                                            </div>
                                                            @if ($errors->has('companion_issue_date'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('companion_issue_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divj">
                                                        <label>Expiry date</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="input-group date datepicker_past"
                                                            data-date-autoclose="true" data-provide="datepicker">
                                                            <input type="text" class="form-control"
                                                                name="companion_expiry_date">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><i
                                                                        class="fa fa-calendar"></i></button>
                                                            </div>
                                                            @if ($errors->has('companion_expiry_date'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('companion_expiry_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group" id="divk">
                                                        <label>Profession</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control"
                                                            name="companion_profession" min="6" required>
                                                        @if ($errors->has('companion_profession'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('companion_profession') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divl">
                                                        <label>Organization</label>
                                                        <span class="text-danger">*</span>
                                                        <input type="text" class="form-control"
                                                            name="companion_organization" min="6" required>
                                                        @if ($errors->has('companion_organization'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('companion_organization') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group" id="divm">
                                                        <label>Arrival date</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="input-group date datepicker_past"
                                                            data-date-autoclose="true" data-provide="datepicker">
                                                            <input type="text" class="form-control"
                                                                name="companion_arrival_date">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><i
                                                                        class="fa fa-calendar"></i></button>
                                                            </div>
                                                            @if ($errors->has('companion_arrival_date'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('companion_arrival_date') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divn">
                                                        <label>Visa duration</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick 1-90"
                                                            name="companion_visa_duration" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divo">
                                                        <label>Visa status</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick"
                                                            name="companion_visa_status" required>
                                                            <option value="1">Multiple</option>
                                                            <option value="2">Single</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <p>
                                            <h5>Please upload require documents for VISA requirement </h5>
                                            <span class="text-danger">
                                                (Note: picture most meet requirement in order to apply for VISA) <br>
                                            </span>
                                            </p>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group" id="divp">
                                                        <label>Passport picture</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="file" class="dropify"
                                                                    name="companion_passport_picture">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('companion_passport_picture'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('companion_passport_picture') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group" id="divq">
                                                        <label>Personal picture</label>
                                                        <span class="text-danger">*</span>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="file" class="dropify"
                                                                    name="companion_personal_picture">
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('companion_personal_picture'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('companion_personal_picture') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="{{ URL::asset('Dashboard/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <!-- page vendor js file -->
    <script src="{{ URL::asset('Dashboard/assets/vendor/toastr/toastr.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/assets/bundles/c3.bundle.js') }}"></script>

    <!-- page js file -->
    <script src="{{ URL::asset('Dashboard/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/h-menu.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/index.js') }}"></script>

    <script src="{{ URL::asset('Dashboard/assets/vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/pages/forms/dropify.js') }}"></script>

    <script src="{{ URL::asset('Dashboard/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        $(function() {
            var $select = $(".1-90");
            for (i = 1; i <= 90; i++) {
                $select.append($('<option></option>').val(i).html(i))
            }
        });
    </script>
    {{-- <script>
        $(document).on('change', '#has_companion', function() {
            var stateID = $(this).val();
            if (stateID == '1') {
                $('.companion-data').slideDown(600)
            } else {
                $('.companion-data').slideUp(600)
            }
        })
    </script> --}}
    <script>
        $(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                endDate: '+0d',
                autoclose: true
            });
        });
        $(function() {
            $(".datepicker_past").datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-0m',
                autoclose: true
            });
        });
    </script>
    <script>
        $(document).on('change', '#has_companion', function() {
            var stateID = $(this).val();
            if (stateID == '2') {
                $("#diva > input").prop("disabled", true);
                $("#divb > input").prop("disabled", true);
                $("#divc > input").prop("disabled", true);
                $("#divd > select").prop("disabled", true);
                $("#dive > select").prop("disabled", true);
                $("#divf > select").prop("disabled", true);
                $("#divg > input").prop("disabled", true);
                $("#divh > select").prop("disabled", true);
                $("#divi > input").prop("disabled", true);
                $("#divj > input").prop("disabled", true);
                $("#divk > input").prop("disabled", true);
                $("#divl > input").prop("disabled", true);
                $("#divm > input").prop("disabled", true);
                $("#divn > select").prop("disabled", true);
                $("#divo > select").prop("disabled", true);
                $("#divp > input").prop("disabled", true);
                $("#divq > input").prop("disabled", true);
            } else {
                $("#diva > input").prop("disabled", false);
                $("#divb > input").prop("disabled", false);
                $("#divc > input").prop("disabled", false);
                $("#divd > select").prop("disabled", false);
                $("#dive > select").prop("disabled", false);
                $("#divf > select").prop("disabled", false);
                $("#divg > input").prop("disabled", false);
                $("#divh > select").prop("disabled", false);
                $("#divi > input").prop("disabled", false);
                $("#divj > input").prop("disabled", false);
                $("#divk > input").prop("disabled", false);
                $("#divl > input").prop("disabled", false);
                $("#divm > input").prop("disabled", false);
                $("#divn > select").prop("disabled", false);
                $("#divo > select").prop("disabled", false);
                $("#divp > input").prop("disabled", false);
                $("#divq > input").prop("disabled", false);
            }
        })
    </script>

</body>

</html>
