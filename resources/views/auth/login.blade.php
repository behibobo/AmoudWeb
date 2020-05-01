@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:40px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border" style="box-shadow: 5px 3px 18px #ccc;border-radius:10px">
                <div style="text-align:right;background-color:white;border-radius:10px 10px 0 0 " class="card-header ">{{ __('ورود') }}</div>

                <div class="card-body " style="background-color:white !important">
                    <form style="direction:rtl" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label ">{{ __('آدرس ایمیل') }} :</label>

                            <div class="col-md-6">
                                <input style="width:80%;background-color:rgba(0, 0, 0, 0.03)
                                    " id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label ">{{ __(' کلمه عبور') }} :</label>

                            <div class="col-md-6">
                                <input style="width:80%;  background-color:rgba(0, 0, 0, 0.03)"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group " style='text-align:center' >
                            
                                <div class="form-check">
                                    <input  class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style="margin-right:20px" class="form-check-label" for="remember">
                                        {{ __('مرا به خاطر بسپار') }}
                                    </label>
                                </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 btn-login-style">
                                <button  type="submit" class="btn btn-primary btn-login">
                                    {{ __('ورود') }}
                                </button>
                                </div>
                               
                            
                        </div>
                        <div class="form-group row mb-0">

                        @if (Route::has('password.request'))
                                    <a  style="color:#212529 !important" class="btn btn-link button-login" href="{{ route('password.request') }}">
                                        {{ __('رمز عبور خود را فراموش کرده اید ؟') }}
                                    </a>
                                @endif
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
