@extends('layouts.administrar')
@section('content')

    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Crear Nuevo Permiso</h1>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="columns">
        <div class="column">
          <form action="{{route('permisos.store')}}" method="POST">
            {{csrf_field()}}

            <div class="block">
              <b-radio-group v-model="tipoPermiso">
                <b-radio name="tipo_permiso" value="basico">Permiso básico</b-radio>
                <b-radio name="tipo_permiso" value="crud">Permiso CRUD</b-radio>
              </b-radio-group>
            </div>

            <div class="field" v-if="tipoPermiso == 'basico'">
              <label for="display_nombre" class="label">Nombre (Nombre a mostrar)</label>
              <p class="control">
                <input type="text" class="input" name="display_name" id="display_name">
              </p>
            </div>

            <div class="field" v-if="tipoPermiso == 'basico'">
              <label for="name" class="label">Slug (Nombre para la ruta única)</label>
              <p class="control">
                <input type="text" class="input" name="name" id="name">
              </p>
            </div>

            <div class="field" v-if="tipoPermiso == 'basico'">
              <label for="description" class="label">Descripción</label>
              <p class="control">
                <input type="text" class="input" name="description" id="description" placeholder="Descripción del permiso a crear">
              </p>
            </div>

            <div class="field" v-if="tipoPermiso == 'crud'">
              <label for="resource" class="label">Tipo de Recurso</label>
              <p class="control">
                <input type="text" class="input" name="resource" id="resource" v-model="resource" placeholder="Nombre del recurso">
              </p>
            </div>

            <div class="columns" v-if="tipoPermiso == 'crud'">
              <div class="column is-one-quarter">
                <b-checkbox-group v-model="crudSeleccionado">

                    <div class="field">
                      <b-checkbox custom-value="create">Crear</b-checkbox>
                    </div>
                    <div class="field">
                      <b-checkbox custom-value="read">Visualizar</b-checkbox>
                    </div>
                    <div class="field">
                      <b-checkbox custom-value="update">Actualizar</b-checkbox>
                    </div>
                    <div class="field">
                      <b-checkbox custom-value="delete">Eliminar</b-checkbox>
                    </div>

                </b-checkbox-group>
              </div>

              <input type="hidden" name="crud_seleccionado" :value="crudSeleccionado">

              <div class="column">
                <table class="table" v-if="resource.length >= 3">
                  <thead>
                      <th>Nombre</th>
                      <th>Slug</th>
                      <th>Descripción</th>
                  </thead>
                  <tbody>
                      <tr v-for="item in crudSeleccionado">
                          <td v-text="crudNombre(item)"></td>
                          <td v-text="crudSlug(item)"></td>
                          <td v-text="crudDescripcion(item)"></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <button class="button is-primary is-outlined"><i class="fa fa-plus m-r-10"></i>Crear Permiso</button>

          </form>
        </div>
      </div>
    </div>
@stop

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data:{
              tipoPermiso : 'basico',
              resource: '',
              crudSeleccionado : ['create', 'read', 'update', 'delete']
            },
            methods:{
              crudNombre: function(item){
                  return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
              },
              crudSlug: function(item){
                return item.toLowerCase() + "-" + app.resource.toLowerCase();
              },
              crudDescripcion: function(item){
                return "Permite al usuario " + item.toUpperCase() + " un " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
              }
            }
        });
    </script>
@stop
