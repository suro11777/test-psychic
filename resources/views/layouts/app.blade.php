<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->

    @include('partials.includes.css')

    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

</head>
<body>
<div class="w-100">

    {{--    <main class="w-100 py-5">--}}
    <div class="container-fluid  main-container">
        @yield('content')
    </div>

</div>


</body>
</html>
