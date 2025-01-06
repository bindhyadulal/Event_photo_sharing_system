@extends('layouts.loginDirect')
@push('scripts')
<style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Poppins", Arial, sans-serif;
      background: linear-gradient(135deg, #f8eaf7, #e0c3fc);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: #fff;
      border-radius: 15px;
      padding: 30px;
      width: 360px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .login-container h1 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #6e3b6e;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .form-group label {
      font-size: 14px;
      color: #6e3b6e;
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      font-size: 14px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-sizing: border-box;
    }

    .form-group input:focus {
      outline: none;
      border-color: #6e3b6e;
      box-shadow: 0 0 0 3px rgba(110, 59, 110, 0.2);
    }

    .login-button {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      background-color: #6e3b6e;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-button:hover {
      background-color: #8b458b;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .login-container p {
      margin-top: 15px;
      font-size: 14px;
      color: #888;
    }

    .login-container p a {
      color: #6e3b6e;
      text-decoration: none;
      font-weight: bold;
    }

    .login-container p a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .login-container {
        width: 90%;
      }
    }
  </style>  
@endpush

@section('loginDirect')
<div class="login-container">
    <h1>Welcome!</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
            <input
            type="email"
            id="email"
            name="email"
            class="@error('email') is-invalid @enderror"
            value="{{ old('email') }}"
            placeholder="Enter your email"
            required
            />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input
            type="password"
            id="password"
            name="password"
            class="@error('password') is-invalid @enderror"
            placeholder="Enter your password"
            required
            />
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- <button type="submit" class="login-button">Sign in</button> --}}
        <button type="submit" class="login-button">
            {{ __('Login') }}
        </button>

        {{-- @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif --}}
    </form>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@stack('scripts')