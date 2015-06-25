<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Administration') - tlmld</title>
    @yield('styles')
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    {!! Html::style('css/admin/app.css') !!}

    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') !!}
    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js') !!}
    @yield('scripts')
    {!! Html::script('js/admin/app.js') !!}
</head>
<body data-controller="{{ $controller }}" data-action="{{ $action }}">

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {!! link_to_route('admin.dashboard', 'tlmld', [], ['class'=>'navbar-brand']) !!}
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('admin.event.create') }}">Ny begivenhed</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="fa fa-sign-out"></span> Log ud</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if (session('message'))
        <div class="alert alert-{{ session('message')[0] }}" role="alert">
            @if (count(session('message')) === 3)
                <strong>{{ session('message')[1] }}</strong> {{ session('message')[2] }}
            @else
                {{ session('message')[1] }}
            @endif
        </div>
    @endif

    @yield('content')
</div>
</body>
</html>