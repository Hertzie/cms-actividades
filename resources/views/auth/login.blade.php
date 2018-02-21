@extends('layouts.app')

@section('content')

<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-content">
        <h1 class="title" align="center">Iniciar Sesión</h1>
        <form action="{{route('login')}}" method="POST" role="form">
          {{csrf_field()}}
            <div class="field">
              <label for="email" class="label">E-mail</label>
              <p class="control">
                <input type="text" class="input {{$errors->has('email') ? 'is-danger' : ''}}" name="email" id="email" placeholder="usuario@ejemplo.com" value="{{old('email')}}">

                @if ($errors->has('email'))
                  <p class="help is-danger">{{$errors->first('email')}}</p>
                @endif
              </p>
            </div>
            <div class="field">
              <label for="password" class="label">Contraseña:</label>
              <p class="control">
                <input type="password" class="input {{$errors->has('password') ? 'is-danger' : ''}}" name="password" id="password">

                @if ($errors->has('password'))
                  <p class="help is-danger">{{$errors->first('password')}}</p>
                @endif
              </p>
            </div>
            <b-checkbox name="remember" class="m-t-20">Recordarme</b-checkbox>

            <button class="button is-primary is-outlined is-fullwidth m-t-30">Log In</button>
      </form>
      </div>
    </div>
    <h5 class="has-text-centered m-t-20"><a href="{{route('password.request')}}" class="is-muted">¿Olvidó la contraseña?</a></h5>

  </div>
</div>

@endsection
