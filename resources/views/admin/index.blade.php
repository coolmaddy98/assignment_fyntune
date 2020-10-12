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
                <a class="nav-link" href="{{route("admin.index")}}">Home</a>
            </li>
            <li class="nav-item">

            </li>
            <li class="nav-item">
                <a href="{{route("logout")}}" class="nav-link">logout</a>
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
    <div class="container-fluid">
        <a href="{{route("blogs.add")}}" class="btn btn-info pull-right">  Create Post</a>
        <table class="table table-striped">
            @if(!$blogs)
                <tr>
                    <td colspan="3">No Record not found.</td>
                </tr>
            @endif
            <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$blog->category->name}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->description}}</td>
                    <td>{{$blog->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
                {{$blogs->isNotEmpty()? $blogs->appends(request()->all())->links() : null}}
    </div>

</div>

</body>
</html>
