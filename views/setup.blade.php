<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Milestone</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-5">
    <form class="m-auto col-lg-5" method="post">
        <div class="text-center">
            <img class="mb-5" src="http://milestoneit.net/images/logo.png" alt="" width="180">
            <h4 class="h4"> Create Setup User </h4>
            <small  class="text-muted">Setup user can create developers and administrator</small>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger py-2 m-0 mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><small>{{ $error }}</small></li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="form-group mt-5 row">
            <label class="col-md-4 col-form-label" for="inputName">Name</label>
            <div class="col-md-8"><input type="text" name="name" id="inputName" class="form-control" required=""></div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label" for="inputEmail">Email</label>
            <div class="col-md-8"><input type="text" name="email" id="inputEmail" class="form-control" required=""></div>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label" for="inputPassword">Password</label>
            <div class="col-md-8"><input type="password" name="password" id="inputPassword" class="form-control" required=""></div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Create</button>
    </form>
</div>
</body>
</html>
