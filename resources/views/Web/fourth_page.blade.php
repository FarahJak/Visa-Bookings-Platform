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
                                <form class="form-auth-small" action="{{ route('confirmVisa', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    {{-- The Data of The Guest --}}
                                    <div class="card">
                                        <div class="header">
                                            <h2>Guest Data</h2>
                                        </div>
                                        <div class="body">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <p><strong>Email : </strong>{{ $user->email }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Mobile Number : </strong>{{ $user->country_code }}
                                                        {{ $user->mobile_number }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>First Name : </strong>{{ $user->first_name }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Last Name : </strong>{{ $user->last_name }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Date of Birth : </strong>{{ $user->date_of_birth }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Place Of Birth : </strong>{{ $user->place_of_birth }}
                                                    </p>
                                                </li>
                                                <li>
                                                    <p><strong>Gender : </strong>{{ $user->gender }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Country Of
                                                            Residency : </strong>{{ $user->country_of_residency }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Passport No : </strong>{{ $user->passport_no }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Issue Date : </strong>{{ $user->issue_date }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Expiry Date : </strong>{{ $user->expiry_date }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Place Of Issue : </strong>{{ $user->place_of_issue }}
                                                    </p>
                                                </li>
                                                <li>
                                                    <p><strong>Profession : </strong>{{ $user->profession }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Organization : </strong>{{ $user->organization }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>has
                                                            Companion :
                                                        </strong>
                                                        @if ($user->has_companion == '1')
                                                            {{ 'Yes' }}
                                                        @else
                                                            {{ 'No' }}
                                                        @endif
                                                    </p>
                                                </li>
                                                <li>
                                                    <p><strong>Arrival Date : </strong>{{ $user->visa->arrival_date }}
                                                    </p>
                                                </li>
                                                <li>
                                                    <p><strong>Visa Duration :
                                                        </strong>{{ $user->visa->visa_duration }}</p>
                                                </li>
                                                <li>
                                                    <p><strong>Visa Status : </strong>{{ $user->visa->visa_status }}
                                                    </p>
                                                </li>
                                                <li>
                                                    <p><strong> Passport Picture : </strong></p><br>
                                                    <img src="{{ asset($user->visa->passport_picture) }}"
                                                        alt="">
                                                </li>
                                                <li>
                                                    <p><strong>Personal Picture :</strong></p><br>
                                                    <img src="{{ asset($user->visa->personal_picture) }}"
                                                        alt="">
                                                </li>

                                            </ul>

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Confirm and Submit
                                    </button>

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
</body>

</html>
