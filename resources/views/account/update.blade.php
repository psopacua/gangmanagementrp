@extends('layouts.app')

@section('title', __('Edit profile'))

@section('content')
<div id="account-update" class="content">
    <div class="row">
        <div class="col-md-8 form-default">
            <h1 class="page-title">{{ __('Edit profile') }}</h1>
            <form action="{{ route('account.update') }}" method="POST">
                @csrf

                <div class="row">
                @if ($errors)
                    <ul class="form-group errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="col-md-6">
                        <label class="control-label">{{ __('Your Name') }}</label>
                        <input type="text" name="name" value="{{ old('name', $account->name) }}" id="name" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">{{ __('Your Email') }}</label>
                        <input type="email" name="email" value="{{ old('email', $account->email) }}" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                    </div>
                    <div class="col-md-6 col-md-offset-6">
                        <button type="submit" class="btn btn-dm">{{ __('Edit profile') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
