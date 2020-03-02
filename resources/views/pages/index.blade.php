<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Web Comic</title>

    </head>
    <body>
      @include('include.navigbar')
      <div class="jumbotron text-center">
      <h1>Welcome to Web Comic</h1>
      <p>Welcome to Web Comic sign up to read and create comics</p>
      <p><a class="btn btn-primary btn-lg" href="/login" role="button">Sign in</a>
        <a class="btn btn-primary btn-lg" href="/register" role="button">Register</a>
      </p>
    </div>
    </body>
</html>
