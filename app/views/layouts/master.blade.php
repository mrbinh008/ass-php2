<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}

    <title>@yield('title')</title>

    {{--Styles css common--}}
    @include("layouts.style")
    {{--Styles link to file or css custom--}}
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
@include('partial.header')
@include('partial.sidebar')
<div class="page-wrapper">
    <div class="container-fluid">
    @yield('content')

@yield('scripts')
@include('partial.footer')

{{--Scripts js common--}}
{{--<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>--}}
{{--Scripts link to file or js custom--}}

</body>
</html>

