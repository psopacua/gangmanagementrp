@extends('layouts.register')

@section ('title', __('Create account'))

@section('content')
<form action="{{ route('account.create') }}" method="POST">
    @csrf

    <div class="form-group label-floating">
        <label class="control-label">{{ __('Your name') }}</label>
        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>


        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group label-floating">
        <label class="control-label">{{ __('Your Email') }}</label>
        <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>


    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    </div>
    <div class="form-group label-floating">
        <label class="control-label">{{ __('Your Password') }}</label>
        <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>

    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
    </div>

    <div class="form-group label-floating">
        <label class="control-label">{{__('Confirm Your Password') }}</label>
        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
    </div>

    <div class="form-group label-floating is-select">
        <label class="control-label">{{  __('Your Gender') }}</label>
        <select class="selectpicker form-control">
            <option value="male">{{ __('Male') }}</option>
            <option value="female">{{ __('Female') }}</option>
        </select>
    </div>

    <div class="remember">
        <div class="checkbox">
            <label>
                <input name="optionsCheckboxes" type="checkbox" required>
                {!! __('I accept the <a href=":route">Terms and Conditions</a> of the website', ['route' => route('home')]) !!}
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-lg btn-primary full-width">{{ __('Create account') }}!</button>

    <div class="or"></div>

    <p>{{ __('Already have an account?') }} <a href="{{ route('account.login') }}">{{ __('Sign in') }}</a></p>
</form>
@endsection
