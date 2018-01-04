﻿<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>中学化学教学系统</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="/public/test/css/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="/public/test/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="/public/test/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="/public/test/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/public/test/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="/public/test/css/font.css" type="text/css" />
  <link rel="stylesheet" href="/public/test/css/app.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="/public/test/js/html5shiv.js"></script>
    <script src="/public/test/js/respond.min.js"></script>
    <script src="/public/test/js/excanvas.js"></script>
  <![endif]-->
</head>
<body class="bg-info dker">
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html"><span class="h1 font-bold">五畜网站</span></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>注册新用户</strong>
        </header>
        <form action="/index.php/index/login/signup" method="post">
          <input type="hidden" value="1" name="tip">
          <div class="form-group">
            <input placeholder="用户名" name="username" required="required" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="form-group">
            <input type="email" placeholder="邮箱" required="required" name="email" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="form-group">
             <input type="password" placeholder="密码" required="required" name="password" class="form-control rounded input-lg text-center no-border">
          </div>
<!--          <div class="checkbox i-checks m-b">-->
<!--            <label class="m-l">-->
<!--              <input type="checkbox" checked=""><i></i>  <a href="#">同意相关条款</a>-->
<!--            </label>-->
<!--          </div>-->
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded">
            <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">注册</span></button>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>已经有账号?</small></p>
          <a href="/index.php/index/login" class="btn btn-lg btn-info btn-block btn-rounded">去登录</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>五畜网站<br>&copy; 2018</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="/public/test/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/public/test/js/bootstrap.js"></script>
  <!-- App -->
  <script src="/public/test/js/app.js"></script>
  <script src="/public/test/js/jquery.slimscroll.min.js"></script>
    <script src="/public/test/js/app.plugin.js"></script>
  <script type="text/javascript" src="/public/test/js/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="/public/test/js/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="/public/test/js/demo.js"></script>
</body>
</html>