<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Login </title>
    <meta property="og:title" content="Sign In">
    <meta name="author" content="Milestone Innovative Technologies">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="">
    <meta name="theme-color" content="#3063A0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('appframe/css/theme.css') }}">

</head>
<body>
<main class="auth">
    <header id="auth-header" class="auth-header">
        <h1>Login</h1>
    </header>
    <form class="auth-form" method="post">
        @csrf
        <div class="form-group">
            <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" required="" value="{{ old('email','') }}">
                <label for="inputEmail">Email</label>
                @if ($errors->has('email')) <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span> @endif
            </div>
        </div>
        <div class="form-group">
            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="" value="{{ old('password','') }}">
                <label for="inputPassword">Password</label>
                @if ($errors->has('password'))<span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>@endif
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
        </div>
        <div class="form-check text-center">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : 'checked' }}>
            <label class="form-check-label" for="remember">Remember</label>
        </div>
    </form>
    <footer class="auth-footer"> © 2018 All Rights Reserved. </footer>
</main>
</body>
</html>