@extends('layouts.inner')

@section('content')
    <script type="text/javascript">
        function hideshow(div){
            if (!document.getElementById)
                return;
            if (div.style.display == "block")
                div.style.display = "none";
            else
                div.style.display = "block";
        }
    </script>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <h1 class="page-header" style="text-transform: uppercase;">{{ $chapter->field }}. Chapter {{ $chapter->chapter_nr }}. {{ $chapter->chapter_name }}</h1>
        <p>{!! nl2br(e($chapter->text)) !!}</p>
        @if(Auth::user())
            <a href="/chapter/next/{{ $chapter->field }}/{{ $next }}/theory" class="btn btn-success pull-right" style="margin-bottom: 10px; margin-left: 10px;">Next chapter</a>
        @else
            <a href="/chapter/{{ $chapter->field }}/{{ $next }}/theory" class="btn btn-success pull-right" style="margin-bottom: 10px; margin-left: 10px;">Next chapter</a>
        @endif
        @if($chapter->field != 'PHP')
            <a href="/chapter/{{ $chapter->field }}/{{ $chapter->chapter_nr }}/practice" class="btn btn-primary pull-right" style="margin-bottom: 10px;">Exercises</a>
        @endif
        @if($chapter->chapter_nr != 1)
            <a href="/chapter/{{ $chapter->field }}/{{ $prev }}/theory" class="btn btn-default pull-right" style="margin-bottom: 10px; margin-right: 10px;">Previous chapter</a><br>
        @endif
        <a href="javascript:hideshow(document.getElementById('usercomments'))" class="btn btn-default" style="margin-bottom: 10px;">Show/hide comments</a>
        <br>
        <div id="usercomments" @if((Auth::check()) && (Auth::user()->learning_style == 'reflector')) style="display: block" @else style="display: none" @endif>
            @foreach($comments as $comment)
                <div class="well">
                    <h5><b><a href="/profile/{{ $comment->user->id }}">{{ $comment->user()->first()->name }} {{ $comment->user()->first()->surname }}</a> on {{ $comment->created_at }} commented</b></h5>
                    <hr>
                    <p>{{ $comment->comment }}</p>
                </div>
            @endforeach
            @if(Auth::check())
                {{ Form::open(array('class' => 'form-newcomment', 'route' => ['createComment', $chapter->id])) }}
                <div class="form-group">
                    {{ Form::label('comment', 'Comment:') }}
                    {{ Form::text('comment', null, array('class'=>'form-control', 'placeholder'=>'Please, leave a comment')) }}
                </div>

                {{ Form::submit('Leave a comment', array('class'=>'btn btn-primary'))}}
                {{ Form::close() }}
            @endif
        </div>
    </div>
@endsection