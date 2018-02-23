@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title" align="center">Crear Nuevo Usuario</h1>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="columns">
        <div class="column">
          <form action="{{route('usuarios.store')}}" method="POST">
            {{csrf_field()}}
              <div class="field">
                <label for="name" class="label">Nombre</label>
                <p class="control">
                  <input type="text" class="input" name="name" id="name">
                </p>
              </div>

              <div class="field">
                <label for="email" class="label">E-mail</label>
                <p class="control">
                  <input type="email" class="input" name="email" id="email">
                </p>
              </div>

              <div class="field">
                <label for="password" class="label">Contraseña</label>
                <p class="control">
                  <input type="text" class="input" name="password" id="password" v-if="!auto_password">
                  <b-checkbox name="auto_generate" class="m-t-10" v-model="auto_password">Auto Generar Contraseña</b-checkbox>
                </p>
              </div>

              <button class="button is-success">Crear</button>
          </form>
        </div>
      </div>
    </div>
@stop

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
              auto_password:true
            }
        });
    </script>
@stop
