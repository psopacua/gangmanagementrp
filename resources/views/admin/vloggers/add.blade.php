@extends('layouts.app')

@section ('title', null)

@section('content')
<div id="admin" class="content">
    <div id="content-header" class="row">
        <div class="col-md-12">
            <h1 class="title"><i class="fa fa-music"></i>{{ __('Vloggers') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <ul class="content-menu">
                <li><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('admin.vloggers') }}">{{ __('Vloggers') }}</a></li>
                <li><a href="#">{{ __('Users') }}</a></li>
            </ul>
        </div>


        <div class="col-md-10">
            <form action="{{ route('admin.vloggers.add') }}" method="POST">
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
                        <label class="control-label">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                    </div>
                        <div class="col-md-6">
                            <label class="control-label">{{ __('Youtube ID') }}</label>
                            <input type="text" name="external_id" value="{{ old('external_id') }}" id="external_id" class="form-control{{ $errors->has('external_id') ? ' is-invalid' : '' }}" required>
                        </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-dm">{{ __('Add') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
