
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div  id="login-box"><h3>Đăng Nhập</h3>
            <form  method="post" action="{!! route('postLogin') !!}" name="login">
                <label class="username">
                    <span>Tài Khoản</span>
                    <input id="username" type="text"  name="username" placeholder="Username" value="" />
                </label>
                <label class="password">
                    <span>Mật Khẩu</span>
                    <input id="password" type="password" name="password" placeholder="Password" value="" />
                </label>
                <button class="button submit-button" class="btn btn-primary" type="submit" name="login">Đăng Nhập</button>
            </form>
        </div>
        <div>
            <label>
                <a href="register">Đăng ký </a>
            </label>
        </div>
        <div>
            <a href="https://www.facebook.com/dialog/oauth?client_id=1510346915949673&redirect_uri=http://localhost/laravel-master/public/callback"><img src="image/facebook.png" /></a>
        </div>
    </body>

</html>