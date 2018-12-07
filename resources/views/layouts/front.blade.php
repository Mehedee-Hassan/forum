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


    <div class="row">
        <div class="row content-heading ">
            <div class="col-md-3"><h4>Category</h4></div>
            <div class="col-md-9 ">
                <div class="row">
                    <div class="col-md-4 "><h4 class="main-content-heading">@yield('heading')</h4>
                    </div>
                    <div class="col-md-offset-6 col-md-2">
                        <a class="btn btn-primary"  href="{{route('thread.create')}}">Create Thread</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <a href="{{ route('thread.index') }}" class="list-group-item">
                    All Threads
                    <span class="badge badge-info ">14</span>
                </a>
                <a href="#" class="list-group-item">
                    JAVA
                    <span class="badge  badge-info ">14</span>
                </a>
                <a href="#" class="list-group-item">
                    PHP
                    <span class="badge badge-info  badge-info ">3</span>
                </a>
                <a href="#" class="list-group-item">
                    PYTHON
                    <span class="badge badge-info ">5</span>
                </a>

            </ul>
        </div>

        <div class="col-md-9">
            <div class="content-wrap well">
                @yield('content')
            </div>
        </div>
    </div>


</div>


<!-- Scripts -->


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
