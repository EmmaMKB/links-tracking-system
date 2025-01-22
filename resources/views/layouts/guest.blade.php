<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Links Tracking System') }}</title>

    <link
        href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&display=swap"
        rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('assets/css/material-icons.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('assets/vendor/spinkit.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/preloader.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    <!-- Dark Mode CSS (optional) -->
    <link type="text/css" href="{{ asset('assets/css/dark-mode.css') }}" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="{{ asset('assets/vendor/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

</head>

<body class="layout-app layout-sticky-subnav">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page-content">
            <div class="">
                <div class="pt-32pt pt-sm-64pt pb-32pt">
                <div class="container-fluid page__container">
                    {{ $slot }}
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>

        <!-- Perfect Scrollbar -->
        <script src="{{ asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

        <!-- DOM Factory -->
        <script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>

        <!-- MDK -->
        <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

        <!-- App JS -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <!-- Highlight.js -->
        <script src="{{ asset('assets/js/hljs.js') }}"></script>

        <!-- App Settings (safe to remove) -->
        <script src="{{ asset('assets/js/app-settings.js') }}"></script>
</body>

</html>
