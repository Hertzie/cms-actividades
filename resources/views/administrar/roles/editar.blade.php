@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Editar {{$role->display_name}}</h1>
        </div>

      </div>

      <hr class="m-t-0">

      <form action="{{route('roles.update', $role->id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="columns">
          <div class="column">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h2 class="title">Detalles del rol:</h1>

                    <div class="field">
                      <p class="control">
                        <label for="display_name" class="label">Nombre (para mostrar)</label>
                        <input type="text" class="input" name="display_name" value="{{$role->display_name}}" id="display_name">
                      </p>
                    </div>

                    <div class="field">
                      <p class="control">
                        <label for="name" class="label">Slug</label>
                        <input type="text" class="input" name="name" value="{{$role->name}}" disabled id="name">
                      </p>
                    </div>

                    <div class="field">
                      <p class="control">
                        <label for="description" class="label">Descripción</label>
                        <input type="text" class="input" name="description" value="{{$role->description}}" id="description">
                      </p>
                    </div>

                    <input type="hidden" :value="permisosSeleccionados" name="permisos">

                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>

        <div class="columns">
          <div class="column">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <h2 class="title">Permisos:</h1>
                    <b-checkbox-group v-model="permisosSeleccionados">

                      @foreach($permisos as $p)
                          <div class="field">
                            <b-checkbox :custom-value="{{$p->id}}">{{$p->display_name}} <em>({{$p->description}})</em></b-checkbox>
                          </div>
                      @endforeach
                    </b-checkbox-group>
                  </div>
                </div>
              </article>
            </div>
            <button class="button is-primary is-outlined"><i class="fa fa-save m-r-10"></i>Guardar cambios en el rol</button>

          </div>
        </div>

      </form>

    </div>
@stop

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data:{
              permisosSeleccionados: {!! $role->permissions->pluck('id') !!}
            }
        });
    </script>
@stop
