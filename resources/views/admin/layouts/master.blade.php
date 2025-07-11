<!DOCTYPE html>
<html lang="fr">

<head>
    @include('admin.partials.meta')
    @yield('title')
    <title>ORDRE PHARMACIEN</title>
    @yield('style')
    @include('admin.partials.style')
    <style>
        .inset-0 {
            z-index: 999999999 !important;
        }
    </style>

<body class="nav-fixed">
    @include('admin.partials.header')
    <div id="layoutSidenav_content">

        @yield('content')

        @include('admin.partials.footer')
    </div>
    </div>
    @include('admin.partials.script')
</body>

</html>
