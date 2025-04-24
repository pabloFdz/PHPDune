<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PHP Dune</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/codemirror.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes-custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-select.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />

    <!--<script src="{{ asset('js/codemirror.js') }}"></script>-->

    <script src="{{ asset('js/cm/codemirror.js') }}"></script>
    <script src="{{ asset('js/cm/matchbrackets.js') }}"></script>
    <script src="{{ asset('js/cm/htmlmixed.js') }}"></script>
    <script src="{{ asset('js/cm/xml.js') }}"></script>
    <script src="{{ asset('js/cm/javascript.js') }}"></script>
    <script src="{{ asset('js/cm/css.js') }}"></script>
    <script src="{{ asset('js/cm/clike.js') }}"></script>
    <script src="{{ asset('js/cm/php.js') }}"></script>
    <script src="{{ asset('js/draggable_panels.js') }}"></script>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<div id="main-container" class="bg-white h-screen flex" theme="dune">

    @if (! ($blank ?? false))
        <div id="title-header" theme="dune" class="absolute inset-0 h-10 w-full flex items-center justify-center text-gray-800 blurred:text-gray-300 font-medium user-select-none" style="-webkit-app-region: drag">
            {{ $title ?? '' }}
        </div>

        <!--<x-nav />-->
    @endif

    <div id="body-output" class="pt-12 mt-6 p-6 lg:p-8 shadow-lg flex-1">
        {{ $slot }}
    </div>
</div>
</body>
</html>
