@extends('web.master')
@section('body')

<div class="page-content d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <section class="px-3 w-100" style="max-width: 500px;">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="login-area p-4 shadow">
                    <h2 class="text-secondary text-center">Welcome Back</h2>
                    <p class="text-center mb-4">Welcome, please login to your account</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="label-title">Email Address</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                                required autofocus autocomplete="username" placeholder="Email Address">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="label-title">Password</label>
                            <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" placeholder="Password">
                        </div>

                        <div class="form-row d-flex justify-content-between mb-3">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="remember_me">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="text-primary" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-secondary btnhover text-uppercase me-2">Log In</button>
                            <a href="/register" class="btn btn-outline-secondary btnhover text-uppercase">Register</a>
                        </div>

                        <!-- Optional Google SSO button -->
                        <div class="text-center">
                            <a href="{{ route('auth.provider', 'google') }}"
                                class="btn btn-outline-primary text-uppercase d-flex align-items-center justify-content-center"
                                style="padding: 10px 15px; border: 2px solid #4285F4; color: #4285F4; font-weight: bold; font-size: 16px; border-radius: 5px;">
                                <i class="fab fa-google" style="margin-right: 8px; font-size: 18px;"></i>
                                Log in with Google
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- SweetAlert2 for error display -->
@if ($errors->any())
<script>
Swal.fire({
    icon: 'error',
    title: 'Login Failed',
    html: `
                <ul style="text-align: left;padding-left:20px !important;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
    confirmButtonText: 'OK',
});
</script>
@endif

@endsection