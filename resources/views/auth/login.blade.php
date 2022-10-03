@extends('layouts.Master')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap');
    input, input[type='email'],input[type='password']{
        height: 30px;
        font-size: 14px;
    }

    .form-select {
        font-size: 14px;
    }
    body{
        font-size: 16px;
        font-family: 'Noto Serif', serif;
    }
</style>
<div class="container-md" style="max-width: 900px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-center" style="font-size: 18px;">Se Connecter</div>

                <div class="card-body bg-white fw-bold" style="height: 300px;display: flex;align-items: center;justify-content: center;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-4" style="width: 400px">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width: 90px; font-size: 16px;">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
