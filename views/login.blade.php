<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Milestone</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
<main class="auth">
    <header id="auth-header" class="auth-header" style="background-image: url(assets/images/illustration/img-1.png);">
        <h1>
            <img src="assets/images/brand-inverse.png" alt="" height="72">
            <span class="sr-only">Sign In</span>
        </h1>
        <p> Don't have a account?
            <a href="auth-signup.html">Create One</a>
        </p>
    </header>
    <!-- form -->
    <form class="auth-form">
        <!-- .form-group -->
        <div class="form-group">
            <div class="form-label-group">
                <input type="text" id="inputUser" class="form-control" placeholder="Username" required="" autofocus="">
                <label for="inputUser">Username</label>
            </div>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                <label for="inputPassword">Password</label>
            </div>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">
            <div class="custom-control custom-control-inline custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember-me">
                <label class="custom-control-label" for="remember-me">Keep me sign in</label>
            </div>
        </div>
        <!-- /.form-group -->
        <!-- recovery links -->
        <div class="text-center pt-3">
            <a href="auth-recovery-username.html" class="link">Forgot Username?</a>
            <span class="mx-2">·</span>
            <a href="auth-recovery-password.html" class="link">Forgot Password?</a>
        </div>
        <!-- /recovery links -->
    </form>
    <!-- /.auth-form -->
    <!-- copyright -->
    <footer class="auth-footer"> © 2018 All Rights Reserved.
        <a href="#">Privacy</a> and
        <a href="#">Terms</a>
    </footer>
</main>

</body>
</html>
