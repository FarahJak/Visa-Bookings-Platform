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

    <style>
        .extra_night_data {
            display: none;
        }
    </style>
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
                                <form class="form-auth-small" action="{{ route('storeUserBooking') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    {{-- The Data of The Guest --}}
                                    <div class="card">
                                        <div class="header">
                                            <p>
                                            <h3>Booking Data</h3>
                                            <h5>Please chose your accommodation preference as you are eligible for
                                                (5-night)</h5>
                                            </p>
                                            <hr>
                                        </div>
                                        <div class="body">
                                            <div class="row">
                                                <div class="col">
                                                    <label>Check-in Date</label>
                                                    <span class="text-danger">*</span>
                                                    <div class="input-group date datepicker_past"
                                                        data-date-autoclose="true" data-provide="datepicker">
                                                        <input type="text" class="form-control" name="check_in_date"
                                                            required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button"><i
                                                                    class="fa fa-calendar"></i></button>
                                                        </div>
                                                        @if ($errors->has('check_in_date'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('check_in_date') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Check-out Date</label>
                                                    <span class="text-danger">*</span>
                                                    <div class="input-group date datepicker_past_plus_five_days"
                                                        data-date-autoclose="true" data-provide="datepicker">
                                                        <input type="text" class="form-control" name="check_out_date"
                                                            required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button"><i
                                                                    class="fa fa-calendar"></i></button>
                                                        </div>
                                                        @if ($errors->has('check_out_date'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('check_out_date') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Room Type</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick" name="room_type"
                                                            required>
                                                            <option value="1">King Bed</option>
                                                            <option value="2">Twin Bed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Extra Night</label>
                                                        <span class="text-danger">*</span>
                                                        <select class="form-control show-tick" name="has_extra_night"
                                                            id="extra_night" required>
                                                            <option value="1">Yes</option>
                                                            <option value="2">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Extra Night --}}
                                            <div class="card extra_night_data">
                                                <div class="body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label>Check-in Date</label>
                                                            <span class="text-danger">*</span>
                                                            <div class="input-group date datepicker_past"
                                                                data-date-autoclose="true" data-provide="datepicker">
                                                                <input type="text" class="form-control"
                                                                    name="check_in_date_2" required>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary"
                                                                        type="button"><i
                                                                            class="fa fa-calendar"></i></button>
                                                                </div>
                                                                @if ($errors->has('check_in_date_2'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('check_in_date_2') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label>Check-out Date</label>
                                                            <span class="text-danger">*</span>
                                                            <div class="input-group date datepicker_past_plus_five_days"
                                                                data-date-autoclose="true" data-provide="datepicker">
                                                                <input type="text" class="form-control"
                                                                    name="check_out_date_2" required>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary"
                                                                        type="button"><i
                                                                            class="fa fa-calendar"></i></button>
                                                                </div>
                                                                @if ($errors->has('check_out_date_2'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('check_out_date_2') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Room Type</label>
                                                                <span class="text-danger">*</span>
                                                                <select class="form-control show-tick"
                                                                    name="room_type_2" required>
                                                                    <option value="1">King Bed</option>
                                                                    <option value="2">Twin Bed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <button type="submit"
                                                class="btn btn-primary btn-lg btn-block">Save</button>
                                        </div>

                                        <div class="col">
                                            <a href="{{ route('fourth_page') }}"
                                                class="btn btn-secondary btn-lg btn-block">
                                                Next
                                                {{-- <button type="submit"></button> --}}
                                            </a>
                                        </div>
                                    </div>
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
        $(document).on('change', '#extra_night', function() {
            var stateID = $(this).val();
            if (stateID == '1') {
                $('.extra_night_data').slideDown(600)
            } else {
                $('.extra_night_data').slideUp(600)
            }
        })
    </script>
    <script>
        $(function() {
            $(".datepicker_past").datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-0m',
                minDate: 0,
                autoclose: true,
            });
        });
        $(function() {
            $(".datepicker_past_plus_five_days").datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-0m',
                endDate: '+5d',
                autoclose: true
            });
        });
    </script>

</body>

</html>
