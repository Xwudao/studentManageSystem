<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - 学生管理系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset("boostrap/style.css") }}">
    <script src="{{ asset("boostrap/js/jquery-3.1.1.min.js") }}"></script>
    <script src="{{ asset("boostrap/js/bootstrap.min.js") }}"></script>
    <link rel="stylesheet" href="{{ asset("boostrap/css/bootstrap.min.css") }}">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">学生成绩管理系统</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               @yield('nav-bar')
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    @yield('content')
</div>
<div id="bottom">
    <div class="notice">
        &copy;2018-版权所有：无道 (夏宽亮)<br />
        夏宽亮参赛作品
    </div>
    @yield('bottom')
</div>
</body>
</html>