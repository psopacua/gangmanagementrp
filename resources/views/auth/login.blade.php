@extends('layouts.login')

@section('title', __('Sign in'))

@section('content')
<form action="{{ route('account.login') }}" method="POST">
    @csrf

    @if ($errors)
    <ul class="form-group errors">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="form-group label-floating">
        <label class="control-label">{{ __('Your Email') }}</label>
        <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
    </div>
    <div class="form-group label-floating">
        <label class="control-label">{{ __('Your Password') }}</label>
        <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
    </div>

    <div class="remember">
        <div class="checkbox">
            <label>
                <input name="optionsCheckboxes" type="checkbox">
                {{ __('Remember Me') }}
            </label>
        </div>
        <a href="#" class="forgot">{{ __('Forgot my Password') }}</a>
    </div>

    <button type="submit" class="btn btn-lg btn-primary full-width">{{ __('Sign in') }}</button>

    <div class="or"></div>

    <p>{!! __('Don\'t you have an account? <a href=":route">Register Now!</a>', ['route' => route('account.create')]) !!}</p>
</form>
@endsection
