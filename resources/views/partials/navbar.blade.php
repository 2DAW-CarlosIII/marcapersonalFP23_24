  <nav id="nav">
      <ul>
          <li @if (Route::currentRouteName() == 'home') class="current" @endif style="white-space: nowrap;"><a
                  href="{{ route('home') }}"><img src="{{ asset('/images/mp-logo.png') }}" height="64px" alt=""
                      style="position:relative;bottom: -22px" /></a></li>
          <li @if (Route::currentRouteName() == 'proyectos') class="current" @endif style="white-space: nowrap;"><a
                  href="{{ route('proyectos') }}">Proyectos</a></li>
          <li @if (Route::currentRouteName() == 'curriculos') class="current" @endif style="white-space: nowrap;"><a
                  href="{{ route('curriculos') }}">Currículos</a></li>
          <li @if (Route::currentRouteName() == 'actividades') class="current" @endif style="white-space: nowrap;"><a
                  href="{{ route('actividades') }}">Actividades</a></li>
          <li @if (Route::currentRouteName() == 'reconocimientos') class="current" @endif style="white-space: nowrap;"><a
                  href="{{ route('reconocimientos') }}">Reconocimientos</a></li>
          <li style="user-select: none; cursor: pointer; white-space: nowrap; opacity: 1;" class="opener">
              <a href="#">Usuario</a>

              @if (Auth::check())
                  <ul style="user-select: none; display: none; position: absolute;" class="dropotron">
                      <li style="white-space: nowrap;"><a href="{{ route('dashboard') }}"
                              style="display: block;">Dashboard</a></li>
                      <li style="white-space: nowrap;"><a href="{{ route('profile.edit') }}"
                              style="display: block;">Profile</a></li>
                              <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li style="white-space: nowrap;">
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </form>
                  </ul>
              @else
                  <ul style="user-select: none; display: none; position: absolute;" class="">
                      <li style="white-space: nowrap;"><a href="{{ route('dashboard') }}" style="display: block;">Login</a>
                      </li>
                      <li style="white-space: nowrap;"><a href="{{ route('register') }}"
                              style="display: block;">Register</a></li>
                      </li>
                  </ul>
              @endif
              <!--
              <a href="#" style="display: block;">Más opciones de usuario</a>
                    <ul style="user-select: none; display: none; position: absolute;" class="dropotron">
                        <li style="white-space: nowrap;"> style="display: block;">Dashboard</a></li>
                        <li style="white-space: nowrap;"> style="display: block;">Profile</a></li>
                        <li style="white-space: nowrap;"> style="display: block;">Logout</a></li>
                    </ul>
                -->

          </li>
      </ul>
  </nav>
