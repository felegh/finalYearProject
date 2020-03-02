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
            width: 700px;
            height: 700px;
            padding: 20px;
            border: 14px solid #aaaaaa;

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

      @include('include.artnavigbar')
      <div class="jumbotron text-center">
          <h1>Upload Your Comic Book Pages</h1>
        <form method="post" action="{{ url('upload-comic')}}" enctype="multipart/form-data"  >
          {{ csrf_field()}}
            Page Number <input type ="number" name = "pageNo" required/> <br/>
            <div id="div1">
            Upload Your Pages (as an Image) <strong>Please make sure the file format is jpeg, gif or png</strong>: <br/>
            <input type ="file" name ="image" id = "img" onchange="displayComic(this);"  value = "Choose Your Cover Page" required/></button>
            <img id="comicimg" src="#" alt="Comic Image" />
            </div>
            <input type = "hidden" name = "postId" value= "{{$postid}}"/>
            <button type="submit" name = "upload" class="btn btn-danger">Publish Your Page</button><br/><br/>
            <input type = "hidden" name = "uploaded" value = "true"/>
        </form>
    </div>
    </body>
</html>
