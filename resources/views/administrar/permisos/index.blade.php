@extends('layouts.administrar')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Permisos</h1>
      </div>
      <div class="column m-l-100">
        <a href="{{route('permisos.create')}}" class="button is-primary is-pulled-right is-outlined"><i class="fa fa-plus m-r-10"></i>Crear nuevo permiso</a>
      </div>
    </div>
    <hr>
  <div class="card">
    <div class="card-content">
      <table class="table is-narrow is-hoverable">
        <thead>
          <tr>
            <th><strong>ID</strong></th>
            <th><strong>Nombre</strong></th>
            <th><strong>Nombre a mostrar</strong></th>
            <th><strong>Descripción</strong></th>
            <th><strong>Creado</strong></th>
            <th><strong>Actualizado</strong></th>
            <th><strong>Acciones</strong></th>
          </tr>
        </thead>
        @if(!$permisos->isEmpty())
          @foreach($permisos as $p)
            <tr>
              <td>{{$p->id}}</th>
              <td>{{$p->name}}</td>
              <td>{{$p->display_name}}</td>
              <td>{{$p->description}}</td>
              <td>{{$p->created_at->diffForHumans()}}</td>
              <td>{{$p->updated_at->diffForHumans()}}</td>
              <td>
                <a class="button is-link is-small tooltip-left" href="{{route('permisos.show', $p->id)}}" data-tooltip="Info"><i class="fa fa-info"></i></a>
                <a class="button is-link is-small tooltip-right" data-tooltip="Editar" href="{{route('permisos.edit', $p->id)}}"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
          @endforeach
        @endif
      </table>
    </div>
  </div>
  </div>
@stop
