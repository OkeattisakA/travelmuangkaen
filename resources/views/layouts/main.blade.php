<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ DB::table('settings')->select('setting_systemname_th')->first()->setting_systemname_th }}</title>

    <!-- Icons -->
    <link href="{{ asset('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/DataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Styles required by this views -->


</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
@include('includes.header')

<div class="app-body">

@include('includes.sidebar')
<!-- Main content -->
    <main class="main">

        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- /.conainer-fluid -->
    </main>

</div>

@include('includes.footer')

<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('node_modules/pace-progress/pace.min.js') }}"></script>

<!-- Plugins and scripts required by all views -->
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/lightbox.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/localization/messages_th.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('node_modules/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/lightbox.min.js') }}"></script>

<!-- CoreUI main scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Plugins and scripts required by this views -->

<!-- Custom scripts required by this view -->

<script>
    @if(Session::has('flash_message'))
        toastr.options = {
        "closeButton": true,
        "timeOut": "3000"
    };
    toastr.{{ Session::get('flash_type') }}("{{ Session::get('flash_message') }}");
    @endif
</script>

@stack('scripts')

</body>
</html>