 <!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Web Comic</title>
        <style>
        pre {
          font-family: "courier new", courier, monospace;
          font-size: 20px;
          }
        </style>
    </head>
    <body>
      @foreach($userId as $userid)
    @if($userid->type === 1)
      @include('include.readnavigbar')
    @else
      @include('include.artnavigbar')
    @endif
    @endforeach

<div class="container">
      <h1>About Publish Your Comic</h1></br>
      <h2>What is Publish Your Comic?</h2></br>
      <pre>Publish Your Comic is an online web application that allows users to create web comic and also to read them.
Publish Your Comic has two types of users Readers and Artists.
Artist can upload their comic book and create comic books. Readers have been given a platform to select and read comic books</pre></br></br>
<h2>Publish Your Comic is Free!</h2></br>
<pre>Publish Your Comic is Free. Reader can read comic books without any payments and Artist can upload use the platform without being charged</pre>
</br></br>
<h2>Developer/Founder</h2></br>
<h3>Feleg B Hagos</h3></br>
<pre>Student at Aston University studying computer science currently in Final Year.</pre>
</div>
    </body>
</html>
