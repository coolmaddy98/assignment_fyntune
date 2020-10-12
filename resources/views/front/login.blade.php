<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
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

            <li>
                <form class="form-inline" action="/action_page.php">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </li>
            <li>
                <a href="{{route("login")}}">Login</a>
            </li>
        </ul>
    </nav>
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
    <form action="{{route("front.login")}}"  method="post" class="was-validated">
        @csrf
        <br><br>
        <div class="form-group">
            <label for="email">email:</label><br>
            <input type="email" class="col-sm-5" id="email" placeholder="Enter username" name="email" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <br>
            <input type="password" class="col-sm-5" id="pwd" placeholder="Enter password" name="password" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
