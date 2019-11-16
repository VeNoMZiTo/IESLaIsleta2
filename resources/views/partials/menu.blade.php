<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/teams*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-users">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.team.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('inicio_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/sliders*') ? 'menu-open' : '' }} {{ request()->is('admin/noticia*') ? 'menu-open' : '' }} {{ request()->is('admin/actividades*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-feather-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.inicio.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('slider_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-images">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.slider.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('noticium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.noticia.index") }}" class="nav-link {{ request()->is('admin/noticia') || request()->is('admin/noticia/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-newspaper">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.noticium.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('actividade_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.actividades.index") }}" class="nav-link {{ request()->is('admin/actividades') || request()->is('admin/actividades/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-child">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.actividade.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('centro_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/calendarios*') ? 'menu-open' : '' }} {{ request()->is('admin/equipo-directivos*') ? 'menu-open' : '' }} {{ request()->is('admin/equipo-docentes*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-graduation-cap">

                            </i>
                            <p>
                                <span>{{ trans('cruds.centro.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('calendario_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.calendarios.index") }}" class="nav-link {{ request()->is('admin/calendarios') || request()->is('admin/calendarios/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.calendario.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('equipo_directivo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipo-directivos.index") }}" class="nav-link {{ request()->is('admin/equipo-directivos') || request()->is('admin/equipo-directivos/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-users">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.equipoDirectivo.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('equipo_docente_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipo-docentes.index") }}" class="nav-link {{ request()->is('admin/equipo-docentes') || request()->is('admin/equipo-docentes/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user-graduate">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.equipoDocente.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('departamento_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.departamentos.index") }}" class="nav-link {{ request()->is('admin/departamentos') || request()->is('admin/departamentos/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-server">

                            </i>
                            <p>
                                <span>{{ trans('cruds.departamento.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('familium_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/tutoria*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.familium.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('tutorium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tutoria.index") }}" class="nav-link {{ request()->is('admin/tutoria') || request()->is('admin/tutoria/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-address-book">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.tutorium.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('descargar_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.descargars.index") }}" class="nav-link {{ request()->is('admin/descargars') || request()->is('admin/descargars/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-file-pdf">

                            </i>
                            <p>
                                <span>{{ trans('cruds.descargar.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('impreso_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.impresos.index") }}" class="nav-link {{ request()->is('admin/impresos') || request()->is('admin/impresos/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-copy">

                            </i>
                            <p>
                                <span>{{ trans('cruds.impreso.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('alumnado_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/horarios*') ? 'menu-open' : '' }} {{ request()->is('admin/grupos*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-user-edit">

                            </i>
                            <p>
                                <span>{{ trans('cruds.alumnado.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('horario_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.horarios.index") }}" class="nav-link {{ request()->is('admin/horarios') || request()->is('admin/horarios/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-clock">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.horario.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('grupo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.grupos.index") }}" class="nav-link {{ request()->is('admin/grupos') || request()->is('admin/grupos/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-align-justify">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.grupo.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>