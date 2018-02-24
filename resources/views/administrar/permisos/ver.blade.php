@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">{{$permiso->display_name}}</h1>
          <h4 class="subtitle m-t-10">Detalles del permiso</h4>
        </div>

        <div class="column">
          <a href="{{route('permisos.edit', $permiso->id)}}" class="button is-primary is-pulled-right is-outlined"><i class="fa fa-edit m-r-10"></i>Editar Permiso</a>
        </div>

      </div>

      <hr class="m-t-0">

      <div class="columns">
        <div class="column">
          <div class="field">
            <label for="display_name" class="label">Nombre</label>
              <pre>{{$permiso->display_name}}</pre>
          </div>

          <div class="field">
            <label for="name" class="label">Slug</label>
              <pre>{{$permiso->name}}</pre>
          </div>

          <div class="field">
            <label for="description" class="label">Descripción:</label>
              <pre>{{$permiso->description}}</pre>
          </div>

        </div>
      </div>
    </div>
@stop
