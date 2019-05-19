@extends('admin_plantilla')
    @section('content_control')
    <h1 class="display-3 text-center">Registrar nuevo Usuario</h1>
                <div class="contenedor-form-user">
                    <form  action="{{route('create_user')}}"  method="post">
                        {{ csrf_field() }}
                        <input  name="name"  class="inputs form-control" id="name"  type="text" placeholder="Nombre">
                        <input  name="email"  class="inputs form-control" id="email"  type="text" placeholder="Email">
                        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                        <input  name="password"  class="inputs form-control" id="password"  type="password" placeholder="Password">
                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                        <input  name="password_confirmation"  class="inputs form-control" id="password_confirmation"  type="password" placeholder="Repetir Password">
                        {!! $errors->first('password_confirmation','<span class="help-block">:message</span>') !!}
                        <div class="grupo-botones">
                            <button type="submit" class="inputs btn btn-primary">Registrar</button>
                            <a href="/admin" class="inputs btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
    @endsection
            