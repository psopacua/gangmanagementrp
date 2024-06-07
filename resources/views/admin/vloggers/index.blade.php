@extends('layouts.app')

@section ('title', null)

@section('content')
<div id="admin" class="content">
    <div id="content-header" class="row">
        <div class="col-md-12">
            <h1 class="title"><i class="fa fa-music"></i> Vloggers</h1>
            <ul class="category-info">
                <li>{{ __('Total vloggers: :count', ['count' => $vloggersCount]) }}</li>
                <li class="subscribe"><a href="{{ route('admin.vloggers.add') }}">{{ __('Add vlogger') }}</a></li>
            </ul>
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
            <div class="row">
            @foreach($vloggers as $vlogger)
                <div class="col-md-6">
                    <div class="chanel-item">
                        <div class="chanel-thumb">
                            <a href="#"><img src="demo_img/ch-1.jpg" alt=""></a>
                        </div>
                        <div class="chanel-info">
                            <a class="title" href="#">{{ $vlogger->name }}</a>
                            <span class="subscribers">{{ __(':count Subscribers', ['count' => '436,414']) }}</span>
                        </div>

                        <div class="actions">
                            <a href="{{ route('admin.vloggers.edit', $vlogger->id) }}" class="subscribe edit">{{ __('Edit') }}</a>
                            <a href="#" class="subscribe status">{{ __('Activate/Deactivate') }}</a>
                            <a href="#" class="subscribe delete">{{ __('Delete') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
