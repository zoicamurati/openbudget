<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Open Budget u krijua dhe po mirëmbahet nga organizata AIS e njohur si promotore e të dhënave të hapura Open Data Albania.
    Për çdo detaj mbi Akses Drejtësi Albania kontaktoni:info@ais.al">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" href="{{URL::asset('/image/favicon.ico')}}">
    <title>Kontakt | AID </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    @stack('head')
</head>

<body>
@include('layouts.header')

    @yield('content')

@include('layouts.footer')

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@stack('scripts')
</body>

</html>
