@extends('layouts.inner')

@section('content')
    <style>
        .list {
            font-size: 18px;
        }
    </style>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Main page</h1>
        <div class="col-md-offset-2">
            <h2>Thank you for using our system!</h2>
            <br>
            <h3>You can see your personal data and knowledge level in <a href="/profile/{{ $user->id }}">your profile page</a>.</h3>
            <br><br>
            @if($user->profile->html == 0 && $user->profile->css == 0 && $user->profile->js == 0 && $user->profile->php == 0)
                <h3>Please, take our short <a href="/knowledgequiz">knowledge</a> and <a href="/stylesquiz">learning styles</a> quizzes for a start.</h3>
            @else
                <h4>You can continue your learning process with these chapters:</h4>
                @if($user->learning_style == 'pragmatist' || $user->learning_style == 'activist')
                    @if($user->profile->html <= 20)
                        <li class="list"><a href="/chapter/HTML/1/practice">HTML. Chapter 1</a></li>
                    @elseif($user->profile->html > 20 && $user->profile->html <=60)
                        <li class="list"><a href="/chapter/HTML/2/practice">HTML. Chapter 2</a></li>
                    @else
                        <li class="list"><a href="/chapter/HTML/3/practice">HTML. Chapter 3</a></li>
                    @endif
                    @if($user->profile->css <= 20)
                        <li class="list"><a href="/chapter/CSS/1/practice">CSS. Chapter 1</a></li>
                    @elseif($user->profile->css > 20 && $user->profile->css <=60)
                        <li class="list"><a href="/chapter/CSS/2/practice">CSS. Chapter 2</a></li>
                    @else
                        <li class="list"><a href="/chapter/CSS/3/practice">CSS. Chapter 3</a></li>
                    @endif
                    @if($user->profile->js <= 40)
                        <li class="list"><a href="/chapter/JS/1/practice">JavaScript. Chapter 1</a></li>
                    @else
                        <li class="list"><a href="/chapter/JS/2/practice">JavaScript. Chapter 2</a></li>
                    @endif
                @else
                    @if($user->profile->html <= 20)
                        <li class="list"><a href="/chapter/HTML/1/theory">HTML. Chapter 1</a></li>
                    @elseif($user->profile->html > 20 && $user->profile->html <=60)
                        <li class="list"><a href="/chapter/HTML/2/theory">HTML. Chapter 2</a></li>
                    @else
                        <li class="list"><a href="/chapter/HTML/3/theory">HTML. Chapter 3</a></li>
                    @endif
                    @if($user->profile->css <= 20)
                        <li class="list"><a href="/chapter/CSS/1/theory">CSS. Chapter 1</a></li>
                    @elseif($user->profile->css > 20 && $user->profile->css <=60)
                        <li class="list"><a href="/chapter/CSS/2/theory">CSS. Chapter 2</a></li>
                    @else
                        <li class="list"><a href="/chapter/CSS/3/theory">CSS. Chapter 3</a></li>
                    @endif
                    @if($user->profile->js <= 40)
                        <li class="list"><a href="/chapter/JS/1/theory">JavaScript. Chapter 1</a></li>
                    @else
                        <li class="list"><a href="/chapter/JS/2/theory">JavaScript. Chapter 2</a></li>
                    @endif
                @endif
                @if($user->profile->php <= 40)
                    <li class="list"><a href="/chapter/PHP/1/theory">PHP. Chapter 1</a></li>
                @else
                    <li class="list"><a href="/chapter/PHP/2/theory">PHP. Chapter 2</a></li>
                @endif
            @endif
        </div>
    </div>
@endsection