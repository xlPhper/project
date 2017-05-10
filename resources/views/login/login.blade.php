@extends('layout.header')

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">h</h1>

        </div>
        <h3>欢迎使用{{$data}}</h3>

        {{--<form class="m-t" role="form" >--}}
            <div class="form-group">
                <input type="text" class="form-control" placeholder="用户名" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="密码" required="">
            </div>
            <div class="btn btn-primary block full-width m-b">登 录</div>


            <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="/register">注册一个新账号</a>
            </p>

        {{--</form>--}}
    </div>
</div>


<script src="{{URL::asset('js/jquery.min.js?v=2.1.4')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js?v=3.3.6')}}"></script>
<script src="{{URL::asset('js/login.js')}}"></script>



</body>

</html>
