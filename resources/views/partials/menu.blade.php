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
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
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
                        </ul>
                    </li>
                @endcan
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
                @can('archivo_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.archivos.index") }}" class="nav-link {{ request()->is('admin/archivos') || request()->is('admin/archivos/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-file-pdf">

                            </i>
                            <p>
                                <span>{{ trans('cruds.archivo.title') }}</span>
                            </p>
                        </a>
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