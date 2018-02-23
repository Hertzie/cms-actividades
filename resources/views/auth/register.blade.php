@extends('layouts.app')

@section('content')
  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h1 class="title" align="center">Registro</h1>
          <form action="{{route('register')}}" method="POST" role="form">
            {{csrf_field()}}
              <div class="field">
                <label for="name" class="label">Nombre</label>
                <p class="control">
                  <input type="text" class="input {{$errors->has('name') ? 'is-danger' : ''}}" name="name" id="name" placeholder="Nombre" value="{{old('name')}}" required>

                  @if($errors->has('name'))
                    <p class="help is-danger">{{$errors->first('name')}}</p>
                  @endif
                </p>
              </div>

              <div class="field">
                <label for="email" class="label">E-mail</label>
                <p class="control">
                  <input type="text" class="input {{$errors->has('email') ? 'is-danger' : ''}}" name="email" id="email" placeholder="usuario@ejemplo.com" value="{{old('email')}}" required>

                  @if ($errors->has('email'))
                    <p class="help is-danger">{{$errors->first('email')}}</p>
                  @endif
                </p>
              </div>
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="password" class="label">Contraseña:</label>
                  <p class="control">
                    <input type="password" class="input {{$errors->has('password') ? 'is-danger' : ''}}" name="password" id="password" required>

                    @if ($errors->has('password'))
                      <p class="help is-danger">{{$errors->first('password')}}</p>
                    @endif
                  </p>
                </div>
              </div>
                <div class="column">
                  <div class="field">
                    <label for="password_confirmation" class="label">Confirmar contraseña:</label>
                    <p class="control">
                      <input type="password" class="input {{$errors->has('password_confirmation') ? 'is-danger' : ''}}" name="password_confirmation" id="password" required>

                      @if ($errors->has('password_confirmation'))
                        <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                      @endif
                    </p>
                  </div>
                </div>
            </div>
              <!-- <b-checkbox name="remember" class="m-t-20">Recordarme</b-checkbox> -->

              <button class="button is-success is-outlined is-fullwidth m-t-30">Registrarse</button>
        </form>
        </div>
      </div>
      <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">¿Ya está registrado?</a></h5>

    </div>
  </div>
@endsection
