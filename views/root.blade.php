<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('appframe.title') }}</title>
    <meta name="author" content="Milestone Innovative Technologies">
    {!! config('appframe.favicon_url')?'<link rel="shortcut icon" href="' . config("appframe.favicon_url") . '">':'' !!}
    <meta name="description" content="{{ config('appframe.page_description') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('appframe/css/iconic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('appframe/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('appframe/css/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ asset('appframe/css/theme-dark.min.css') }}" data-skin="dark">
    <script> var skin = localStorage.getItem('skin') || 'default';
        var unusedLink = document.querySelector('link[data-skin]:not([data-skin="'+ skin +'"])');
        unusedLink.setAttribute('rel', '');
        unusedLink.setAttribute('disabled', true);
    </script>
</head>
<body>

<div class="app" id="app">
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <app-loading></app-loading>
    <header class="app-header app-header-dark">
        <div class="top-bar">
            <div class="top-bar-brand">
                <a href="{{ route('root') }}">{!! config('appframe.brand')?'<img src="'.config('appframe.brand').'" height="32" alt="'.config('appframe.brand_text').'">':config('appframe.brand_text') !!}</a>
            </div>
            <div class="top-bar-list">
                <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none"><button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="Menu" aria-controls="navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button></div>
                <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                    <div class="dropdown">
                        <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <user-avatar size="md"></user-avatar>
                            <account-summary class="pr-lg-4 d-none d-lg-block"></account-summary>
                        </button>
                        <div class="dropdown-arrow dropdown-arrow-left"></div>
                        <account-options class="dropdown-menu"></account-options>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <aside class="app-aside app-aside-expand-md app-aside-light">
        <div class="aside-content">
            <header class="aside-header d-block d-md-none">
                <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                    <user-avatar size="lg"></user-avatar>
                    <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span>
                    <account-summary></account-summary>
                </button>
                <div id="dropdown-aside" class="dropdown-aside collapse">
                    <account-options area="pb-3"></account-options>
                </div>
            </header>

            <section class="aside-menu has-scrollable">
                <nav id="stacked-menu" class="stacked-menu">
                    <app-navs></app-navs>
                </nav>
            </section>
            <div class="aside-footer border-top p-3">
                <button class="btn btn-light btn-block" data-toggle="skin">Night mode <i class="fas fa-moon ml-1"></i></button>
            </div>

        </div>

    </aside>

    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <transition name="breadcrumb"><app-breadcrumb :key="$route.fullPath"></app-breadcrumb></transition>
                        <router-view :key="$route.fullPath" name="fabcontent"></router-view>
                        <transition name="pagetitle"><app-page-title :key="$store.getters['PTTL/title']($route.params.action)"></app-page-title></transition>
                    </header>
                    <div class="page-section d-md-flex justify-content-between mb-2">
                        <app-list-search></app-list-search>
                        <app-list-pagination></app-list-pagination>
                        <app-content-action></app-content-action>
                    </div>
                    <div class="page-section">
                        <div id="slow_connection_page_loading" style="height: 10rem;">
                            <style type="text/css">
                                @-webkit-keyframes load-spinner { 0% {-webkit-transform: rotate(0deg);transform: rotate(0deg)} to {-webkit-transform: rotate(1turn);transform: rotate(1turn)} }
                                @keyframes load-spinner { 0% {-webkit-transform: rotate(0deg);transform: rotate(0deg)} to {-webkit-transform: rotate(1turn);transform: rotate(1turn)} }
                            </style>
                            <div class="loading-container">
                                <div class="app-loading" style="display: block;z-index: 1030; width: 10rem;height: 10rem;border: 3px solid transparent;border-top-color: #00a28a;border-bottom-color: #00a28a;border-radius: 10rem;-webkit-animation: load-spinner 2s linear infinite;animation: load-spinner 2s linear infinite; margin: auto"></div>
                            </div>
                        </div>
                        <transition name="appcontent"><router-view :key="$route.fullPath" name="appcontent"></router-view></transition>
                        <auth-warning></auth-warning>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    window.VuexStoreState = {
        data:{!! request()->user()->load(['Groups' => function($Q){ $Q->withoutGlobalScope('withoutSetup')->with('Roles.Resources.Resource.Defaults'); }]) !!},
        logout_url:'{!! route('logout') !!}',
        login_url:'{!! route('login') !!}',
        profile_url:'{!! route('profile',['id' => \Illuminate\Support\Facades\Auth::id()]) !!}',
        root_path:'{{ config('appframe.root_path') }}'
    };
</script>
<script src="{{ asset('appframe/js/app.js') }}"></script>
<script src="{{ asset('appframe/js/stacked-menu.min.js') }}"></script>
<script src="{{ asset('appframe/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('appframe/js/main.min.js') }}"></script>
</body>
</html>
