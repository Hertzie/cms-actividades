@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
          <div class="column">
            <h1 class="title" align="center">Editar Permiso</h1>
          </div>
        </div>
        <hr class="m-t-0">

      <div class="columns">
        <div class="column">
            <form action="{{route('permisos.update', $permiso->id)}}" method="POST">
                {{method_field('PUT')}}
                {{csrf_field()}}

                <div class="field">
                  <label for="display_name" class="label">Nombre (Nombre a mostrar)</label>
                  <p class="control">
                      <input type="text" class="input" name="display_name" id="display_name" value="{{$permiso->display_name}}">
                  </p>
                </div>

                <div class="field">
                  <label for="name" class="label">Slug (No puede cambiarse)</label>
                  <p class="control">
                    <input type="text" class="input" name="name" id="name" value="{{$permiso->name}}" disabled>
                  </p>
                </div>

                <div class="field">
                  <label for="description" class="label">Descripción</label>
                  <p class="control">
                    <input type="text" class="input" name="description" id="description" value="{{$permiso->description}}">
                  </p>
                </div>

                <button class="button is-primary is-outlined"><i class="fa fa-save m-r-10"></i>Actualizar</button>
            </form>
        </div>
      </div>
    </div>
@stop
