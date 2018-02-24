@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">{{$usuario->name}}</h1>
          <h4 class="subtitle m-t-10">Detalles del usuario</h4>
        </div>

        <div class="column">
          <a href="{{route('usuarios.edit', $usuario->id)}}" class="button is-primary is-pulled-right is-outlined"><i class="fa fa-edit m-r-10"></i>Editar Usuario</a>
        </div>

      </div>

      <hr class="m-t-0">

      <div class="columns">
        <div class="column">
          <div class="field">
            <label for="name" class="label">Nombre</label>
              <pre>{{$usuario->name}}</pre>
          </div>

          <div class="field">
            <label for="email" class="label">E-mail</label>
              <pre>{{$usuario->email}}</pre>
          </div>

          <div class="field">
            <label for="activo" class="label">Usuario activo:</label>
              <p>
                @if($usuario->activo==0)
                    NO
                @else
                    SI
                @endif
              </p>
          </div>

          <div class="field">
            <label for="email" class="label">Roles del usuario:</label>
            <ul>
              {{$usuario->roles->count() == 0 ? 'Aún no han sigo asignados roles a este usuario' : ''}}
              @foreach($usuario->roles as $role)
                <li>{{$role->display_name}} ({{$role->description}})</li>
              @endforeach
            </ul>
          </div>

        </div>
      </div>
    </div>
@stop
