<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/img/newlogos/png/icon.png" sizes="16x16">
    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link rel="stylesheet" href="/css/unify-core.css">
    <link rel="stylesheet" href="/css/unify-components.css">
    <link rel="stylesheet" href="/css/unify-globals.css">
    <link rel="stylesheet" href="/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/customperf.css">
    <link rel="stylesheet" href="/css/custom-2.css">
    @yield('styles')
</head>

<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">
    @yield('content')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="/vendor/popper.min.js"></script>
    <script src="/vendor/bootstrap/bootstrap.min.js"></script>
    @yield('scripts')

</body>

</html>