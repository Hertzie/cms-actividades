@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Administrar Roles</h1>
        </div>
        <div class="column">
          <a href="{{route('roles.create')}}" class="button is-primary is-pulled-right is-outlined"><i class="fa fa-plus m-r-10"></i>Crear nuevo rol</a>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="columns is-multiline">
        @foreach($roles as $r)
            <div class="column is-one-quarter">
              <div class="box">
                <article class="media">
                  <div class="media-content">
                    <div class="content">
                      <h3 class="title">{{$r->display_name}}</h3>
                      <h4 class="subtitle"><em>{{$r->name}}</em></h4>
                      <p>
                        {{$r->description}}
                      </p>
                    </div>

                    <nav class="columns is-mobile">
                      <div class="column is-one-half">
                          <a href="{{route('roles.show', $r->id)}}" class="button is-primary is-outlined is-fullwidth"><i class="fa fa-info m-r-10"></i>Detalles</a>
                      </div>
                      <div class="column is-one-half">
                          <a href="{{route('roles.edit', $r->id)}}" class="button is-primary is-outlined is-fullwidth"><i class="fa fa-edit m-r-10"></i>Editar</a>
                      </div>
                    </nav>
                  </div>
                </article>
              </div>
            </div>
        @endforeach
      </div>
    </div>
@stop
