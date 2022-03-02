<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <style>
    body {
      font-family: cursive;
    }
    img{
      width: 100%;
      object-fit: contain;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <h3>Posts</h3>
      </div>

      @foreach($posts as $post)
      <div class="col-md-8 mt-3">
        <div class="card" style="width: 100%;box-shadow: 0px 0px 6px 2px #0000002e;">
          <div class="card-body">
            <div class="media">
              <img src="{{asset('image/'.$post->user->image)}}" class="mr-3" onerror="this.src='/images/default.png';" alt="..." style="width:50px;height:50px;border-radius:25px;object-fit: cover;">
              <div class="media-body">
                <h5 class="mt-0">{{$post->user->name}}</h5>
                <p style="color:#00000085;">@foreach($post->user->roles as $role)/{{$role->name}}@endforeach</p>
              </div>
            </div>
            <h6 class="card-title">{{$post->title}}</h6>
            <p class="card-text">{{$post->body}}</p>

              
          <?php
          $media = $post->getMedia('media');
          //dd($post);
          ?>

          @foreach($media as $me)
          {{$me}}
          @endforeach

          </div>
        
          <!--  -->
        </div>
      </div>
      @endforeach

   
      <!-- @foreach($media as $me)
          {{$me->getUrl()}}
          @endforeach -->

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>