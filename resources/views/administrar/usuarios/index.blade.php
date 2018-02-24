@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Usuarios</h1>
        </div>
        <div class="column m-l-100">
          <a href="{{route('usuarios.create')}}" class="button is-primary is-pulled-right is-outlined"><i class="fa fa-user-plus m-r-10"></i>Crear nuevo usuario</a>
        </div>
      </div>
      <hr>
    <div class="card">
      <div class="card-content">
        <table class="table is-narrow">
          <thead>
            <tr>
              <th><strong>ID</strong></th>
              <th><strong>Nombre</strong></th>
              <th><strong>Email</strong></th>
              <th><strong>Creado</strong></th>
              <th><strong>Actualizado</strong></th>
              <th><strong>Estatus</strong></th>
              <th><strong>Acciones</strong></th>
            </tr>
          </thead>
          @if(!$usuarios->isEmpty())
            @foreach($usuarios as $u)
              <tr>
                <td>{{$u->id}}</th>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->created_at->diffForHumans()}}</td>
                <td>{{$u->updated_at->diffForHumans()}}</td>
                <td>
                  @if($u->activo == 0)
                    <strong><span class="has-text-danger">Inactivo</span></strong>
                  @else
                    <strong><span class="has-text-success">Activo</span></strong>
                  @endif
                </td>
                <td>
                  <a class="button is-link is-small tooltip-left" href="{{route('usuarios.show', $u->id)}}" data-tooltip="Info"><i class="fa fa-info"></i></a>
                  <a class="button is-link is-small tooltip-right" data-tooltip="Editar" href="{{route('usuarios.edit', $u->id)}}"><i class="fa fa-edit"></i></a>
                </td>
              </tr>
            @endforeach
          @endif
        </table>
      </div>
    </div>
      {{$usuarios->links()}}
    </div>

@stop
