{!!Form::open(array('route'=>'sendRegister','method' => 'post','files' => true))!!}
{!!Form::label('','Username')!!}
{!!Form::text('username','',array('class'=> 'inpput'))!!}<br><br>
{!!Form::label('','Full name')!!}
{!!Form::text('name','',array('class'=> 'inpput'))!!}<br><br>
{!!Form::label('','Password')!!}
{!!Form::password('password','',array('class'=> 'inpput'))!!}<br><br>
{!!Form::label('','RePassword')!!}
{!!Form::password('rePassword','',array('class'=> 'inpput'))!!}<br><br>
{!!Form::label('','Email')!!}
{!!Form::email('email','',array('class'=> 'inpput'))!!}<br><br>
@if(count($errors)>0)
<ul>
    @foreach($errors->all() as $error)
    <li>{!!$error!!}</li>
    @endforeach
</ul>
@endif
{!!Form::submit('Gửi')!!}
{!!Form::reset('Xóa')!!}
{!!Form::close()!!}