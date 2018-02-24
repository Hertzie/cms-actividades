@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Crear Nuevo Rol</h1>
        </div>

      </div>

      <hr class="m-t-0">

      <form action="{{route('roles.store')}}" method="POST">
        {{csrf_field()}}

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
                        <input type="text" class="input" name="display_name" id="display_name">
                      </p>
                    </div>

                    <div class="field">
                      <p class="control">
                        <label for="name" class="label">Slug</label>
                        <input type="text" class="input" name="name" id="name">
                      </p>
                    </div>

                    <div class="field">
                      <p class="control">
                        <label for="description" class="label">Descripción</label>
                        <input type="text" class="input" name="description" id="description">
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
            <button class="button is-primary is-outlined">Crear Rol</button>

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
              permisosSeleccionados: []
            }
        });
    </script>
@stop
