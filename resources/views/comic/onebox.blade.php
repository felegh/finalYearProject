<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <title>Web Comic</title>
        <style>
        #div1 {
            width: 500px;
            height: 500px;
            padding: 20px;
            border: 1px solid #aaaaaa;
        }
        </style>
        <script>
        function displayComic(input) {
        if (input.files && input.files[0]) {
            var readComic = new FileReader();

            readComic.onload = function (e) {
                $('#comicimg')
                    .attr('src', e.target.result)
                    .width(500)
                    .height(500);
            };

            readComic.readAsDataURL(input.files[0]);
        }
    }
        </script>
    </head>
    <body>
      @include('include.navigbar')
      <div class="jumbotron text-center">
        <form method="post" action="{{ url('upload-comic')}}" enctype="multipart/form-data"  >
          {{ csrf_field()}}
            Page Number<input type ="Text" name = "page"/> <br/>
            <div id="div1">
            Upload an image: <br/>
            <input type ="file" name ="image" id = "img" onchange="displayComic(this);"/>
            <img id="comicimg" src="#" alt="Comic Image" />
            </div>
            <input type = "submit" name = "upload" value = "Upload image"/><br/><br/>
            <input type = "hidden" name = "uploaded" value = "true"/>
        </form>
    </div>
    </body>
</html>
