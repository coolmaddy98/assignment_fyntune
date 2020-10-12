<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$title}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-sm bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route("app")}}">Home</a>
            </li>

            <li class="nav-item">
                <form class="form-inline" action="{{route('app')}}" method="get">
                    <input class="form-control mr-sm-2" type="text" name="title" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
            <li class="nav-item">
                <a href="{{route("login")}}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{route("register")}}" class="nav-link">Register</a>
            </li>
        </ul>
    </nav>
    <br>
    <div class="container-fluid">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="true">x</button>
            </div>
        @endforeach
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-error">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
            </div>
        @endif
        @if(session()->has('info'))
            <div class="alert alert-info">
                {{session('info')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
            </div>
        @endif
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h6 class="nav-link">Category</h6>
                </li><li class="nav-item">
                    <a class="nav-link" href="{{route('blogs.category',['id'=>0])}}">All</a>
                </li>
                @foreach($categories as $cat)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blogs.category',['id'=>$cat->id])}}">{{$cat->name}}</a>
                </li>
                @endforeach

            </ul>
        </nav>
        @foreach($blogs as $blog)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$blog->title}}</h4>
                <p class="card-text">{{$blog->description}}</p>
                <a href="#" class="card-link">Read more</a>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{$blogs->isNotEmpty()? $blogs->appends(request()->all())->links() : null}}
            </div>
        </div>
    </div>

</div>

</body>
</html>
