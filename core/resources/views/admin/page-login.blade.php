<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" href="{{asset('assets/home/siteLogo/'.$gnl->favicon)}}" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/toastr.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/toastr.css')}}">
    <title>{{$gnl->title}}</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover" style="background-color: #{{$gnl->color1}};"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>{{$gnl->title}}</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="post" action="{{route('admin.login.post')}}">
            @csrf
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Admin log in</h3>
          <div class="form-group">
            <label class="control-label" >USERNAME</label>
            <input class="form-control" type="text" name="username" placeholder="Username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">

          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>

      </div>
    </section>

    <!-- Essential javascripts for application to work-->
    <script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/toastr.min.js')}}"></script>

    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
    @include('notification.notification')
  </body>
</html>
