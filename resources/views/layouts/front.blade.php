<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    {{--<link href="{{ asset('css/flaty-bootstrap.min.css') }}" rel="stylesheet">--}}
    {{--<link href="https://bootswatch.com/3/superhero/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="https://bootswatch.com/3/simplex/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="https://bootswatch.com/3/readable/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="https://bootswatch.com/3/darkly/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="https://bootswatch.com/3/paper/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="https://bootswatch.com/3/journal/bootstrap.min.css" rel="stylesheet">--}}
    <link href="https://bootswatch.com/3/flatly/bootstrap.min.css" rel="stylesheet">
    {{--<link href="https://bootswatch.com/3/lumen/bootstrap.min.css" rel="stylesheet">--}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>

@include('layouts.partials.navbar')

@yield('banner')


<div class="container">

    @include('layouts.partials.form-error')

    @include('layouts.partials.form-success')



    <div class="row">

       @section('category')
            @include('layouts.partials.category')
        @show
        <div class="col-md-9">
            <div class="row content-heading"><h4>@yield('heading')</h4> </div>
            <div class="content-wrap well">
                @yield('content')
            </div>
        </div>
    </div>


</div>


<!-- Scripts -->


<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('bootstrap.min.js') }}"></script>--}}
</body>
</html>
