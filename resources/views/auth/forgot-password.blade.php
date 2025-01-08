@extends('web.master')
@section('body')

<div class="page-content d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <section class="px-3 w-100" style="max-width: 500px;">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="login-area p-4 shadow">
                    <h2 class="text-secondary text-center">Forgot Your Password?</h2>
                    <p class="text-center mb-4">No worries! Just let us know your email address and we'll send you a password reset link.</p>

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

                    <!-- Status Message -->
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="label-title">Email Address</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email Address">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btnhover text-uppercase">Email Password Reset Link</button>
                        </div>

                        <!-- <div class="text-center">
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary btnhover text-uppercase">Back to Login</a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
