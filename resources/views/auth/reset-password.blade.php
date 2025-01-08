<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo-img {
            max-height: 80px;
            margin-bottom: 1rem;
        }

        .form-control, .btn {
            border-radius: 5px;
        }

        .btn {
            padding: 0.75rem 1.25rem;
        }
    </style>
</head>
<body>
@php 
        $logo = App\Models\GeneralSetting::where("name","logo")->first();
@endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="text-center">
                        <img src="{{ asset('images/general_settings/' . $logo->value) }}" alt="Your Logo" class="logo-img">
                    </div>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3" style="display:none !important">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <a class="text-decoration-none text-sm text-primary" href="{{ route('login') }}">Back to Login</a>
                            <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
