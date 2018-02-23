<nav class="nav has-shadow">
   <div class="container">
     <div class="nav-left">
       <a class="nav-item is-paddingless" href="{{route('home')}}">
         <img src="{{asset('imagenes/hcc.jpg')}}" alt="DevMarketer logo">
       </a>
       <a class="nav-item is-tab is-hidden-mobile m-l-10">Acerca de</a>
       <a class="nav-item is-tab is-hidden-mobile">Foro</a>
       <a class="nav-item is-tab is-hidden-mobile">Compartir</a>
     </div>
     <span class="nav-toggle">
       <span></span>
       <span></span>
       <span></span>
     </span>
     <div class="nav-right nav-menu" style="overflow: visible">
       <a class="nav-item is-tab is-hidden-tablet is-active">Acerca de</a>
       <a class="nav-item is-tab is-hidden-tablet">Foro</a>
       <a class="nav-item is-tab is-hidden-tablet">Compartir</a>
       @if (Auth::guest())
         <a href="{{route('login')}}" class="nav-item is-tab">Login</a>
         <a href="{{route('register')}}" class="nav-item is-tab">Registrarse</a>
       @else
         <button class="dropdown is-aligned-right nav-item is-tab" >
           {{ Auth::user()->name }}
           <i class="fa fa-user m-l-5"></i>
           <ul class="dropdown-menu" style="overflow: visible;">
             <li><a href="#">
                   <span class="icon">
                     <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                   </span>Perfil
                 </a>
             </li>
             <li><a href="#">
                   <span class="icon">
                    <i class="fa fa-fw fa-bell m-r-5"></i>
                  </span>Notificaciones
                 </a>
             </li>
             <li><a href="{{route('administrar.dashboard')}}">
                   <span class="icon">
                     <i class="fa fa-fw fa-cog m-r-5"></i>
                   </span>Administrar
                 </a>
             </li>
             <li class="seperator"></li>
             <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                   <span class="icon">
                     <i class="fa fa-fw fa-sign-out m-r-5"></i>
                   </span>
                   Salir
                 </a>
                 <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                    {{csrf_field()}}
                 </form>

             </li>
           </ul>
         </button>
       @endif
     </div>
   </div>
 </nav>
