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
                            <span class="account-summary pr-lg-4 d-none d-lg-block">
                                <span class="account-name">{{ request()->user()->name }}</span>
                                <span class="account-description">Top Role</span>
                            </span>
                        </button>
                        <div class="dropdown-arrow dropdown-arrow-left"></div>

                        <div class="dropdown-menu">
                            <h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6>
                            <a class="dropdown-item" href="user-profile.html">
                                <span class="dropdown-icon oi oi-person"></span> Profile</a>
                            <a class="dropdown-item" href="auth-signin-v1.html">
                                <span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Help Center</a>
                            <a class="dropdown-item" href="#">Ask Forum</a>
                            <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
                        </div>

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
                    <span class="account-summary">
                <span class="account-name">aside Name</span>
                <span class="account-description">aside Role</span>
              </span>
                </button>
                <div id="dropdown-aside" class="dropdown-aside collapse">
                    <div class="pb-3">
                        <a class="dropdown-item" href="user-profile.html">
                            <span class="dropdown-icon oi oi-person"></span> Profile</a>
                        <a class="dropdown-item" href="auth-signin-v1.html">
                            <span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Help Center</a>
                        <a class="dropdown-item" href="#">Ask Forum</a>
                        <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
                    </div>
                </div>
            </header>

            <section class="aside-menu has-scrollable">
                <nav id="stacked-menu" class="stacked-menu">
                    <!--
ul.menu
	li.menu-header
	li.menu-item | has-child, has-active, has-open
		a.menu-link
			span.menu-icon
			span.menu-text
			span.badge
		ul.menu
		            -->
                </nav>
            </section>

        </div>

    </aside>

    <main class="app-main">
        <div class="wrapper">
            <div class="page">
                <div class="page-inner">
                    <header class="page-title-bar">
                    </header>
                    <div class="page-section">
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    window.VuexStoreState = {
        user:{!! request()->user() !!}
    }
</script>
<script src="{{ asset('appframe/js/app.js') }}?_={{ mt_rand() }}"></script>
<script src="{{ asset('appframe/js/stacked-menu.min.js') }}"></script>
<script src="{{ asset('appframe/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('appframe/js/main.min.js') }}"></script>
</body>
</html>