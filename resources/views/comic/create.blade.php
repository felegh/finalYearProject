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
         .title{

    position: absolute;
    top: 300px;
    right: 400px;
    font-size: 18px;
         }
         .summary{

    position: absolute;
    top: 400px;
    right: 200px;
    font-size: 18px;
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
        <h1>Upload your cover page</h1> <br/><br/>
        <form method="post" action="{{ url('upload-image')}}" enctype="multipart/form-data"  >
          {{ csrf_field()}}
          <div class = "title"><textarea name = "title" placeholder="Enter your title" style="height:50px; width:400px" required></textarea> <br/><br/> </div>
            <div class = "summary">
              <textarea name="summary" placeholder="Summary of your comic book" style="height:200px; width:700px" required></textarea>
               <br/></div>
            <div id="div1">
            Upload Your Cover Page (as an Image): <br/>
            <input type ="file" name ="image" id = "img" onchange="displayComic(this);" value="Choose Your Cover Page" required/>
            <img id="comicimg" src="#" alt="Comic Image" />
            </div>
            <button type="submit" name = "upload" class="btn btn-danger">Upload Your Cover Page</button>
            <input type = "hidden" name = "uploaded" value = "true"/>
        </form>
    </div>
    </body>
</html>
