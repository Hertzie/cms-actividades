<div style="position:fixed;height:100vh;width:200px;background-color:white;overflow-y:scroll;">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{route('administrar.dashboard')}}">Dashboard</a></li>
    </ul>

    <p class="menu-label">
      Administración
    </p>
    <ul class="menu-list">
      <li><a href="{{route('usuarios.index')}}">Administración de Usuarios</a></li>
      <li>
        <a href="">Roles &amp; Permisos</a>
        <ul>
          <li><a href="{{route('permisos.index')}}">Permisos</a></li>
          <li><a href="{{route('roles.index')}}">Roles</a></li>
        </ul>
      </li>


    </ul>
  </aside>
</div>
