@extends('layouts.app')

@section ('title', null)

@section('content')
<div id="admin" class="content">
    <div class="row">
        <div class="col-md-2">
            <ul class="content-menu">
                <li><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('admin.vloggers') }}">{{ __('Vloggers') }}</a></li>
                <li><a href="#">{{ __('Users') }}</a></li>
            </ul>
        </div>

        <div class="col-md-10 content-section">
            Dashboard
        </div>
    </div>
</div>
@endsection