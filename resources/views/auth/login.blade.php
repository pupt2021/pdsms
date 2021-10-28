@extends('layouts.app')
@section('content')
<div class="auth-box card">
    <div class="login-logo">
<!--<a href="{{ url('/') }}"><b>PDSMS</b>Admin</a>-->
        <image class="profile-img" src="/assets/dms_images/Copy of Dental Supply.png" style="width: 60%; margin-bottom: -15px;"></image>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          {{--  <div class="row" style="margin-left: 10px;"> --}}
               <!-- <div class="col-8">
                    <div class="icheck-primary">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>-->
                <!-- /.col -->
            <div class="row m-t-30">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-md btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            {{-- </div> --}}
             </div>
        </form>
        <br />
        <p class="mb-0">
            {{--<a href="{{route('register')}}" class="text-center">Create new account</a>--}}
            <a href="/"><b class="f-w-600">Back to Website</b></a>
        </p>
       
    </div>
    <!-- /.login-card-body -->
</div>
</div>

@endsection
