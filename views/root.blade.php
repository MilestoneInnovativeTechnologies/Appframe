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

    <link rel="stylesheet" href="{{ asset('appframe/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('appframe/css/theme.css') }}">

</head>
<body>

<div class="app" id="app">
    <app-loading></app-loading>
    <header class="app-header">
        <div class="top-bar">
            <div class="top-bar-brand">
                <a href="{{ route('root') }}">{!! config('appframe.brand')?'<img src="'.config('appframe.brand').'" height="32" alt="'.config('appframe.brand_text').'">':config('appframe.brand_text') !!}</a>
            </div>
            <div class="top-bar-list">
                <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                    <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="Menu"
                            aria-controls="navigation">
                        <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                    <div class="dropdown">
                        <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <account-summary class="pr-lg-4 d-none d-lg-block"></account-summary>
                        </button>
                        <div class="dropdown-arrow dropdown-arrow-left"></div>
                        <account-options class="dropdown-menu"></account-options>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <aside class="app-aside">
        <div class="aside-content">
            <header class="aside-header d-block d-md-none">
                <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                    <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span>
                    <account-summary></account-summary>
                </button>
                <div id="dropdown-aside" class="dropdown-aside collapse">
                    <account-options class="pb-3"></account-options>
                </div>
            </header>

            <section class="aside-menu has-scrollable">
                <nav id="stacked-menu" class="stacked-menu">
                    <app-navs></app-navs>
                </nav>
            </section>

        </div>

    </aside>

    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <!--<transition name="breadcrumb"><router-view name="breadcrumb" :key="$route.fullPath"></router-view></transition>-->
                        <transition name="pagetitle"><app-page-title :key="$store.state.PAGE.title"></app-page-title></transition>
                    </header>
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
        data:{!! request()->user()->load('Groups.Roles.Resources') !!},
        logout_url:'{!! route('logout') !!}',
        login_url:'{!! route('login') !!}',
    };
</script>
<script src="{{ asset('appframe/js/app.js') }}?_={{ mt_rand() }}"></script>
<script src="{{ asset('appframe/js/stacked-menu.min.js') }}"></script>
<script src="{{ asset('appframe/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('appframe/js/main.min.js') }}"></script>
</body>
</html>