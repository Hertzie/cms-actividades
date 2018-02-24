@extends('layouts.administrar')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">{{$role->display_name}}<small class="m-l-25"><em>({{$role->name}})</em></small></h1>
          <h5>{{$role->description}}</h5>
        </div>
        <div class="column">
          <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is-pulled-right is-outlined"><i class="fa fa-edit m-r-10"></i>Editar rol</a>
        </div>
      </div>

      <hr class="m-t-0">

      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Permisos:</h1>
                  <ul>
                    @foreach($role->permissions as $r)
                        <li><strong>{{$r->display_name}}</strong> <em class="m-l-15">({{$r->description}})</em></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
@stop
