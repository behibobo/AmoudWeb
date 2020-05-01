@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="margin-top:40px" class="col-md-8">
            <div class="card border"style="box-shadow: 5px 3px 18px #ccc;border-radius:10px">
                <div class="card-header" style=";text-align:right;background-color:white;border-radius:10px 10px 0 0 ">{{ __('ثبت نام') }}</div>

                <div class="card-body">
                    <form  style="direction:rtl" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label ">{{ __('نام:') }}</label>

                            <div class="col-md-6">
                                <input style="width:80%; background-color:rgba(0, 0, 0, 0.03)" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label ">{{ __('آدرس ایمیل:') }}</label>

                            <div class="col-md-6">
                                <input style="width:80%;background-color:rgba(0, 0, 0, 0.03)" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label ">{{ __('کلمه عبور:') }}</label>

                            <div class="col-md-6">
                                <input style="width:80%;background-color:rgba(0, 0, 0, 0.03)" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label ">{{ __('تایید کلمه عبور:') }}</label>

                            <div class="col-md-6">
                                <input style="width:80%; background-color:rgba(0, 0, 0, 0.03)" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div style="margin:auto;width:50%" class="form-group row ">
                            
                                <button style="margin:auto" type="submit" class="btn btn-primary btn-register">
                                    {{ __('ثبت نام') }}
                                </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
