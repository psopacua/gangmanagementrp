<?php
/**
 * Bekende Vloggende Nederlanders
 */
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title') | Bekende Vloggende Nederlanders</title>

        <meta name="keywords" content="Blog website templates" />
        <meta name="description" content="Author - Personal Blog Wordpress Template">
        <meta name="author" content="Rabie Elkheir">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- // Styles -->
        <link rel="stylesheet" href="{{ asset('themes/default/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Raleway:400,500,700|Roboto:300,400,500,700,900|Ubuntu:300,300i,400,400i,500,500i,700">
        <link rel="stylesheet" href="{{ asset('themes/default/css/default.css') }}" />

        <style>
            #app {
                padding: 0 250px;
            }

            #processing {
                position: absolute;
            }
            #processing.on {
                opacity: 0.7;
                z-index: 10000;
                background: black;
                height: 100%;
                width: 100%;
            }

            #all-output.on {
                display: table;
                content: " ";
            }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="processing"></div>

        <!-- Header -->
        <header>
            <div class="container-full">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <a id="main-category-toggler" class="hidden-md hidden-lg hidden-md" href="#">
                            <i class="fa fa-navicon"></i>
                        </a>
                        <a id="main-category-toggler-close" class="hidden-md hidden-lg hidden-md" href="#">
                            <i class="fa fa-close"></i>
                        </a>
                        <div id="logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('themes/default/img/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    @if (Auth::check())
                    <div id="account-menu" class="col-lg-offset-8 col-lg-2 col-md-offset-8 col-md-2 col-sm-offset-7 col-sm-3 hidden-xs hidden-sm">
                            <div class="dropdown">
                            <a data-toggle="dropdown" href="#" class="user-area">
                                <div class="thumb"><img src="{{ asset($userData->image) }}" alt="{{ $userData->name }}">
                                </div>
                                <h2>{{ $userData->name }}</h2>
                                <h3>{{ __(':count Favorite vloggers', ['count' => $userData->favoritesCount ]) }}</h3>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </header>
        <!-- /Header -->

        <div class="site-output clearfix">
            <div class="col-md-2 no-padding-left hidden-sm hidden-xs">
                <div class="left-sidebar">
                    <div id="sidebar-stick">
                        <ul class="menu-sidebar">
                            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>{{ __('Home') }}</a></li>
{{--                            <li><a href="{{ route('favorites') }}"><i class="fa fa-star"></i>{{ __('Favorites') }}</a></li>--}}
{{--                            <li><a href="{{ route('vloggers') }}"><i class="fa fa-rss"></i>{{ __('Vloggers') }}</a></li>--}}
                        </ul>
                        @if(Auth::check())
                        <ul class="menu-sidebar">
                            <li><a href="{{ route('favorites.change') }}"><i class="fa fa-edit"></i>{{ __('Edit favorites') }}</a></li>
                            <li><a href="{{ route('account.update') }}"><i class="fa fa-edit"></i>{{ __('Edit profile') }}</a></li>
                            @can('admin.dashboard')
                            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-edit"></i>{{ __('Administration panel') }}</a></li>
                            @endcan
                            <li><a href="{{ route('account.logout') }}"><i class="fa fa-sign-out"></i>{{ __('Sign out') }}</a></li>
                        </ul>
                        @else
                        <ul class="menu-sidebar">
                            <li><a href="{{ route('account.login') }}"><i class="fa fa-sign-in"></i>{{ __('Sign in') }}</a></li>
                            <li><a href="{{ route('account.create') }}"><i class="fa fa-edit"></i>{{ __('Create account') }}</a></li>
                        </ul>
                        @endif
                    </div><!-- // sidebar-stick -->
                    <div class="clear"></div>
                </div><!-- // left-sidebar -->
            </div>

            <div id="all-output" class="col-md-10">
                @yield('content')
            </div>
        </div>

        <script src="{{ asset('themes/default/js/vue.js') }}"></script>

        <!-- // JavaScript -->
        <script src="{{ asset('themes/default/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('themes/default/js/jquery.sticky-kit.min.js') }}"></script>
        <script src="{{ asset('themes/default/js/custom.js') }}"></script>
        <script src="{{ asset('themes/default/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('themes/default/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('themes/default/js/grid-blog.min.js') }}"></script>
    </body>
</html>
