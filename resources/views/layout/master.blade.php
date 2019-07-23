<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>안녕하세요</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">블로그</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

        </ul>
        <div>
            @if(!auth()->check())
            <form class="form-inline my-2 my-lg-0" action="/user/login" method="post">
                @csrf
                <input type="email" class="form-control mr-1" placeholder="아이디" name="email">
                <input type="password" class="form-control mr-1" placeholder="비밀번호" name="password">
                <button class="btn btn-outline-success my-2 my-sm-0 mr-1" type="submit">로그인</button>
                <a href="/user/register" class="btn btn-outline-primary">회원가입</a>
            </form>
            @else
            <button class="btn btn-outline-success">{{auth()->user()->name}}
            <span class="badge badge-light">{{ auth()->user()->boards()->count() }}</span></button>

            @endif
        </div>

    </div>
</nav>
<div>
    @if(session('fm'))
        <div class="alert alert-primary" role="alert">
            {{ session('fm') }}
        </div>
    @endif
</div>
<div class="container">
    @yield('content')
</div>
</body>
</html>
