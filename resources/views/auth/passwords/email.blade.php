@extends('layouts.app')

@section('content')
<div class="container"  style="margin-top:40px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border" style="box-shadow: 5px 3px 18px #ccc;border-radius:10px">
                <div class="card-header" style="text-align:right;background-color:white;border-radius:10px 10px 0 0">{{ __('بازنشانی گذرواژه') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  style="direction:rtl" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label ">{{ __('آدرس ایمیل') }}</label>

                            <div class="col-md-6">
                                <input style="background-color:rgba(0, 0, 0, 0.03);width:80%" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div style="margin:auto;width:50%" class="form-group row mb-0">
                           
                                <button  type="submit" class="btn btn-primary btn-setpassword">
                                    {{ __('ارسال لینک بازنشانی گذرواژه') }}
                                </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
