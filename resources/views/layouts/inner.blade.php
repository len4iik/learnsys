<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Helen Shorohova">
    <title>Learn system</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{ URL::asset('dashboard.css') }}" rel="stylesheet">
    @section('head')
    @show
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Web technologies learning system</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/about">About</a></li>
                @if(Auth::check())
                    <li><a href="/profile/{{ Auth::user()->id }}">My profile</a></li>
                    <li><a href="/logout">Log out</a></li>
                @else
                    <li><a href="/login">Log in</a></li>
                    <li><a href="/signup">Sign up</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class=""><a href="/">Main page</a></li>
                <br>
                @if(Auth::check())
                    <li><b>Recommended chapters:</b></li>
                    @if(Auth::user()->learning_style == 'pragmatist' || Auth::user()->learning_style == 'activist')
                        @if(Auth::user()->profile->css <= 20)
                            <li><a href="/chapter/CSS/1/practice">CSS. Chapter 1</a></li>
                        @elseif(Auth::user()->profile->css > 20 && Auth::user()->profile->css <=60)
                            <li><a href="/chapter/CSS/2/practice">CSS. Chapter 2</a></li>
                        @else
                            <li><a href="/chapter/CSS/3/practice">CSS. Chapter 3</a></li>
                        @endif
                        @if(Auth::user()->profile->html <= 20)
                            <li><a href="/chapter/HTML/1/practice">HTML. Chapter 1</a></li>
                        @elseif(Auth::user()->profile->html > 20 && Auth::user()->profile->html <=60)
                            <li><a href="/chapter/HTML/2/practice">HTML. Chapter 2</a></li>
                        @else
                            <li><a href="/chapter/HTML/3/practice">HTML. Chapter 3</a></li>
                        @endif
                        @if(Auth::user()->profile->js <= 40)
                            <li><a href="/chapter/JS/1/practice">JS. Chapter 1</a></li>
                        @else
                            <li><a href="/chapter/JS/2/practice">JS. Chapter 2</a></li>
                        @endif
                    @else
                        @if(Auth::user()->profile->css <= 20)
                            <li><a href="/chapter/CSS/1/theory">CSS. Chapter 1</a></li>
                        @elseif(Auth::user()->profile->css > 20 && Auth::user()->profile->css <=60)
                            <li><a href="/chapter/CSS/2/theory">CSS. Chapter 2</a></li>
                        @else
                            <li><a href="/chapter/CSS/3/theory">CSS. Chapter 3</a></li>
                        @endif
                        @if(Auth::user()->profile->html <= 20)
                            <li><a href="/chapter/HTML/1/theory">HTML. Chapter 1</a></li>
                        @elseif(Auth::user()->profile->html > 20 && Auth::user()->profile->html <=60)
                            <li><a href="/chapter/HTML/2/theory">HTML. Chapter 2</a></li>
                        @else
                            <li><a href="/chapter/HTML/3/theory">HTML. Chapter 3</a></li>
                        @endif
                        @if(Auth::user()->profile->js <= 40)
                            <li><a href="/chapter/JS/1/theory">JS. Chapter 1</a></li>
                        @else
                            <li><a href="/chapter/JS/2/theory">JS. Chapter 2</a></li>
                        @endif
                    @endif
                    @if(Auth::user()->profile->php <= 40)
                        <li><a href="/chapter/PHP/1/theory">PHP. Chapter 1</a></li>
                    @else
                        <li><a href="/chapter/PHP/2/theory">PHP. Chapter 2</a></li>
                    @endif
                    <br>
                    <li><b>All chapters:</b></li>
                    @foreach($chapters as $chapter)
                        <li class="navItems"><a href="/chapter/{{ $chapter->field }}/{{ $chapter->chapter_nr }}/theory">{{ $chapter->field }}. Chapter {{ $chapter->chapter_nr }}. {{ $chapter->chapter_name }}</a></li>
                    @endforeach
                @else
                    @foreach($chapters as $chapter)
                        <li class="navItems"><a href="/chapter/{{ $chapter->field }}/{{ $chapter->chapter_nr }}/theory">{{ $chapter->field }}. Chapter {{ $chapter->chapter_nr }}. {{ $chapter->chapter_name }}</a></li>
                    @endforeach
                @endif
            </ul>
            <ul class="nav nav-sidebar">
            </ul>
        </div>
    </div>
</div>
@yield('content')
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
<script type='text/javascript' src='quiz.js'></script>
</body>
</html>