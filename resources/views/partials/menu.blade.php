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
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('estructura_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/teams*') ? 'menu-open' : '' }} {{ request()->is('admin/asginaturas*') ? 'menu-open' : '' }} {{ request()->is('admin/cursos*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-hotel">

                            </i>
                            <p>
                                {{ trans('cruds.estructura.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.team.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asginatura_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asginaturas.index") }}" class="nav-link {{ request()->is('admin/asginaturas') || request()->is('admin/asginaturas/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-align-justify">

                                        </i>
                                        <p>
                                            {{ trans('cruds.asginatura.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('curso_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cursos.index") }}" class="nav-link {{ request()->is('admin/cursos') || request()->is('admin/cursos/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-list-ol">

                                        </i>
                                        <p>
                                            {{ trans('cruds.curso.title') }}
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
                            <i class="fa-fw nav-icon fas fa-feather-alt">

                            </i>
                            <p>
                                {{ trans('cruds.inicio.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('slider_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-images">

                                        </i>
                                        <p>
                                            {{ trans('cruds.slider.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('noticium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.noticia.index") }}" class="nav-link {{ request()->is('admin/noticia') || request()->is('admin/noticia/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon far fa-newspaper">

                                        </i>
                                        <p>
                                            {{ trans('cruds.noticium.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('actividade_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.actividades.index") }}" class="nav-link {{ request()->is('admin/actividades') || request()->is('admin/actividades/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-child">

                                        </i>
                                        <p>
                                            {{ trans('cruds.actividade.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('centro_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/calendarios*') ? 'menu-open' : '' }} {{ request()->is('admin/equipo-directivos*') ? 'menu-open' : '' }} {{ request()->is('admin/equipo-docentes*') ? 'menu-open' : '' }} {{ request()->is('admin/consejo-escolars*') ? 'menu-open' : '' }} {{ request()->is('admin/documentos-institucionales*') ? 'menu-open' : '' }} {{ request()->is('admin/descargars*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-graduation-cap">

                            </i>
                            <p>
                                {{ trans('cruds.centro.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('calendario_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.calendarios.index") }}" class="nav-link {{ request()->is('admin/calendarios') || request()->is('admin/calendarios/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.calendario.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('equipo_directivo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipo-directivos.index") }}" class="nav-link {{ request()->is('admin/equipo-directivos') || request()->is('admin/equipo-directivos/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.equipoDirectivo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('equipo_docente_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipo-docentes.index") }}" class="nav-link {{ request()->is('admin/equipo-docentes') || request()->is('admin/equipo-docentes/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user-graduate">

                                        </i>
                                        <p>
                                            {{ trans('cruds.equipoDocente.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('consejo_escolar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.consejo-escolars.index") }}" class="nav-link {{ request()->is('admin/consejo-escolars') || request()->is('admin/consejo-escolars/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-child">

                                        </i>
                                        <p>
                                            {{ trans('cruds.consejoEscolar.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('documentos_institucionale_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.documentos-institucionales.index") }}" class="nav-link {{ request()->is('admin/documentos-institucionales') || request()->is('admin/documentos-institucionales/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.documentosInstitucionale.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('descargar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.descargars.index") }}" class="nav-link {{ request()->is('admin/descargars') || request()->is('admin/descargars/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-file-pdf">

                                        </i>
                                        <p>
                                            {{ trans('cruds.descargar.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('familium_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/tutoria*') ? 'menu-open' : '' }} {{ request()->is('admin/ampas*') ? 'menu-open' : '' }} {{ request()->is('admin/documentos-familia*') ? 'menu-open' : '' }} {{ request()->is('admin/descagar-familia*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.familium.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('tutorium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tutoria.index") }}" class="nav-link {{ request()->is('admin/tutoria') || request()->is('admin/tutoria/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-address-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tutorium.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ampa_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ampas.index") }}" class="nav-link {{ request()->is('admin/ampas') || request()->is('admin/ampas/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fab fa-adn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ampa.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('documentos_familium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.documentos-familia.index") }}" class="nav-link {{ request()->is('admin/documentos-familia') || request()->is('admin/documentos-familia/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.documentosFamilium.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('descagar_familium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.descagar-familia.index") }}" class="nav-link {{ request()->is('admin/descagar-familia') || request()->is('admin/descagar-familia/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.descagarFamilium.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('alumnado_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/proyectos*') ? 'menu-open' : '' }} {{ request()->is('admin/junta-delegados*') ? 'menu-open' : '' }} {{ request()->is('admin/actividades-extraescolares*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-futbol">

                            </i>
                            <p>
                                {{ trans('cruds.alumnado.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('proyecto_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.proyectos.index") }}" class="nav-link {{ request()->is('admin/proyectos') || request()->is('admin/proyectos/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon far fa-bookmark">

                                        </i>
                                        <p>
                                            {{ trans('cruds.proyecto.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('junta_delegado_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.junta-delegados.index") }}" class="nav-link {{ request()->is('admin/junta-delegados') || request()->is('admin/junta-delegados/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-bullhorn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.juntaDelegado.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('actividades_extraescolare_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.actividades-extraescolares.index") }}" class="nav-link {{ request()->is('admin/actividades-extraescolares') || request()->is('admin/actividades-extraescolares/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fab fa-adn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.actividadesExtraescolare.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('secretarium_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/impresos*') ? 'menu-open' : '' }} {{ request()->is('admin/secretaria-informacions*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-list-alt">

                            </i>
                            <p>
                                {{ trans('cruds.secretarium.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('impreso_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.impresos.index") }}" class="nav-link {{ request()->is('admin/impresos') || request()->is('admin/impresos/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-copy">

                                        </i>
                                        <p>
                                            {{ trans('cruds.impreso.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('secretaria_informacion_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.secretaria-informacions.index") }}" class="nav-link {{ request()->is('admin/secretaria-informacions') || request()->is('admin/secretaria-informacions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-ellipsis-v">

                                        </i>
                                        <p>
                                            {{ trans('cruds.secretariaInformacion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('profesorado_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/grupos*') ? 'menu-open' : '' }} {{ request()->is('admin/archivos-grupos*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-align-justify">

                            </i>
                            <p>
                                {{ trans('cruds.profesorado.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('grupo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.grupos.index") }}" class="nav-link {{ request()->is('admin/grupos') || request()->is('admin/grupos/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.grupo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('archivos_grupo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.archivos-grupos.index") }}" class="nav-link {{ request()->is('admin/archivos-grupos') || request()->is('admin/archivos-grupos/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.archivosGrupo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>