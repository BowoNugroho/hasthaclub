@extends('auth::layouts.master')

@section('content')
<div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <a href="{{ route('shop.index') }}" class="navbar-brand navbar-brand-autodark">
          <img src="{{ url('public/modules/shop/images/hasthaclub.png') }}" width="150" height="100" alt="Tabler" class="navbar-brand-image">
        </a>
      </div>
      <form class="card card-md" action="{{ route('login') }}" method="post">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
                <label class="form-label">Username / Email address</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username or email" value="{{ old('username') }}" autocomplete="username" autofocus>
                {{-- @if ($errors->has('username'))
                    <div class="alert alert-danger">
                        {{ $errors->first('username') }}
                    </div>
                @endif --}}
                {{-- @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
              </label>
              <div class="input-group input-group-flat">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" autocomplete="current-password">
                <span class="input-group-text">
                    <a href="#" onclick="showPassword()" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                        <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="2" />
                            <path
                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                            </svg>
                    </a>
                </span>
                {{-- @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                @endif --}}
                {{-- @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
            @if ($errors->has('message'))
                <div class="alert alert-danger mt-2">
                    {{ $errors->first('message') }}
                </div>
            @endif
        </div>
      </form>
      <div class="text-center text-secondary mt-3">
        Don't have account yet? <a href="#" tabindex="-1">Sign up</a>
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script type="text/javascript">
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
