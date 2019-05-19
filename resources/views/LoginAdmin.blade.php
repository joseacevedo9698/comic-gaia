<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/LoginAdmin.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500|Raleway:800i" rel="stylesheet"> 
    <title>Login Administrator</title>
</head>
<body>
    <div class="header"><a href="/" class="linkIndex">Inicio</a></div>
    <div class="container">
        <img src="{{asset('images/Backgrounds/Comic-Login-Background.jpg')}}" class="fondo" alt="">
        <div class="tittle"><h1>Comics Gaia</h1></div>
        <form action="{{route('login')}}" method="POST" class="login">
            <fieldset>
            <div class="fieldset">
                <legend align="center"><img src="{{asset('images/Backgrounds/logofalso.png')}}" alt=""></legend>
                    <h2>Inicio de Sesión</h2>
                    {{ csrf_field() }}
                    @if (session()->has('flash'))
                        <span class="help-block">{{session('flash')}}</span>
                    @endif
                    <input placeholder="Ingrese Email" type="email" name="email" value="{{old('email')}}">
                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                    <input type="password" name="password" placeholder="password">
                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                    <button type="submit">Ingresar</button>
            </div>
            </fieldset>
        </form>
    </div>
</body>
</html>