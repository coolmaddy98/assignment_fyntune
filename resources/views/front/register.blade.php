<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogging</title>
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

            <li class="nav-item">
                <form class="form-inline" action="/action_page.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
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
            <div class="alert alert-danger">
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

    <form class="form-horizontal" action="{{route("users.create")}}" method="post">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-5">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="mobile">Phone:</label>
            <div class="col-sm-5">
                <input type="number" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
