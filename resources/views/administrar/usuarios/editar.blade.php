@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title" align="center">Editar Usuario ({{$usuario->name}})</h1>
        </div>
      </div>
      <hr class="m-t-0">

          <form action="{{route('usuarios.update', $usuario->id)}}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="name" class="label">Nombre</label>
                  <p class="control">
                    <input type="text" class="input" name="name" id="name" value="{{$usuario->name}}">
                  </p>
                </div>

                <div class="field">
                  <label for="email" class="label">E-mail</label>
                  <p class="control">
                    <input type="email" class="input" name="email" id="email" value="{{$usuario->email}}">
                  </p>
                </div>

              <div class="field">
                <label for="activo" class="label">Estatus</label>
                <p class="control">
                  <select name="activo" class="input">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </p>
              </div>

              <div class="field">
                <label for="password" class="label">Contraseña</label>
                <b-radio-group v-model="password_opciones">

                  <div class="field">
                    <b-radio value="mantener">Mantener contraseña actual</b-radio>
                  </div>

                  <div class="field">
                    <b-radio value="auto">Generar contraseña automáticamente</b-radio>
                  </div>

                  <div class="field">
                    <b-radio value="manual">Cambiar contraseña manualmente</b-radio>
                    <p class="control">
                      <input type="text" class="input m-t-10" name="password" id="password" v-if="password_opciones == 'manual'" placeholder="Ingrese aquí la contraseña">
                    </p>
                  </div>

                </b-radio-group>
              </div>
            </div>

            <div class="column">
                  <label for="roles" class="label">Roles:</label>
                  <input type="hidden" name="roles" :value="rolesSeleccionados">

                  <b-checkbox-group v-model="rolesSeleccionados">
                      @foreach($roles as $role)
                          <div class="field">
                            <b-checkbox :custom-value="{{$role->id}}">{{$role->display_name}} ({{$role->description}})</b-checkbox>
                          </div>
                      @endforeach
                  </b-checkbox-group>
              </div>
        </div>

            <div class="columns">
                <div class="column">
                  <hr>
                  <button class="button is-primary is-pulled-right is-outlined" style="width: 250px;"><i class="fa fa-save m-r-10"></i>Actualizar Usuario</button>
                </div>
            </div>
      </form>
    </div>
@stop

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
              password_opciones : 'mantener',
              rolesSeleccionados : {!! $usuario->roles->pluck('id') !!}
            }
        });
    </script>
@stop
