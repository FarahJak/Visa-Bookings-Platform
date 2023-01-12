<!doctype html>
<html lang="en">

<head>
    <title>Mobile Number Verification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/css/main.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('Dashboard/assets/vendor/multi-select/css/multi-select.css') }}">

</head>

<body data-theme="light" class="font-nunito">
    <!-- WRAPPER -->
    <div id="wrapper" class="theme-cyan">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="card">
                        <div class="header">
                            <p class="lead">Mobile Number Verification</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="{{ route('storeMobileNumber') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Email</label>
                                    <span class="text-danger">*</span><br>
                                    <small>Please enter your email that you have registered by</small>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Country code</label>
                                    <span class="text-danger">*</span>
                                    @php
                                        $countries = App\Models\Country::all();
                                    @endphp
                                    <select class="form-control show-tick" name="country_code" required>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->dial_code }}">
                                                {{ $country->name }}: {{ $country->dial_code }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="phone" class="control-label">Mobile Number</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" id="phone" name="mobile_number" class="form-control"
                                        placeholder="Mobile Number" required
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @if ($errors->has('mobile_number'))
                                        <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="control-label">OTP CODE</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="OTP_CODE" placeholder="OTP CODE"
                                        maxlength="4" required
                                        onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)">
                                    @if ($errors->has('OTP_CODE'))
                                        <span class="text-danger">{{ $errors->first('OTP_CODE') }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Next</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>
