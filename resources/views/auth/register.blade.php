@extends('web.master')
@section('body')

<div class="page-content d-flex align-items-center justify-content-center mt-5 mb-5" style="min-height: 100vh;">
    <section class="px-3 w-100" style="max-width: 500px;">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="login-area p-4 shadow">
                    <h2 class="text-secondary text-center">Create an Account</h2>
                    <p class="text-center mb-4">Join us by creating a new account</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="label-title">Name</label>
                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="label-title">Email Address</label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Email Address">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="label-title">Phone</label>
                            <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="label-title">Password</label>
                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="label-title">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>

                        

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a class="text-decoration-none text-sm text-primary" href="/login">Already registered?</a>
                            <button type="submit" class="btn btn-primary">Register</button>
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

@endsection
