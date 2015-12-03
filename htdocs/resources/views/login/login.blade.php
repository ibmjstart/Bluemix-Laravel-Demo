{!!Form::open(array('route'=>'postLogin','method' => 'post','files' => true))!!}
{!!Form::label('','Username')!!}
{!!Form::text('username','',array('class'=> 'inpput'))!!}<br><br>
{!!Form::label('','Password')!!}
{!!Form::password('password','',array('class'=> 'inpput'))!!}<br><br>
<div class="checkbox">
    <label>
        <input type="checkbox" name="remember"> Remember Me
    </label>
</div>
{!!Form::submit('Đăng Nhập')!!}
{!!Form::close()!!}
<div>
    <label>
        <a href="register">Đăng ký </a>
    </label>
</div>
<div>
    <a href="https://www.facebook.com/dialog/oauth?client_id=1510346915949673&redirect_uri=http://localhost/laravel-master/public/callback"><img src="image/facebook.png" /></a>
</div>