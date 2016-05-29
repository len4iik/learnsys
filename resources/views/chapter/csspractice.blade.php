@extends('layouts.inner')

@section('content')
    <script type="text/javascript">
        window.onload = function(){
            var html = document.getElementById("html"),
                    css = document.getElementById("css"),
                    output = document.getElementById("output"),
                    working = false,
                    fill = function(){
                        if(working){
                            return false;
                        }
                        working = true;
                        var document = output.contentDocument,
                                style = document.createElement("style");
                        document.body.innerHTML = html.textContent;
                        style.innerHTML = css.textContent.replace(/\s/g,"");
                        document.body.appendChild(style);
                        working = false;
                    };
            html.onkeyup = fill;
            css.onkeyup=fill;
        };
        function result(){
            if(document.getElementById('showcorrect').style.display == "block") {
                document.getElementById('editable').style.display = "none";
                document.getElementById('noneditable').style.display = "table";
                document.getElementById('showcorrect').style.display = "none";
                document.getElementById('hidecorrect').style.display = "block";
                var html = document.getElementById("resulthtml");
                var css = document.getElementById("resultcss");
                var output = document.getElementById("resultoutput");
                var resultdocument = output.contentDocument;
                var style = document.createElement("style");
                resultdocument.body.innerHTML = html.textContent;
                style.innerHTML = css.textContent.replace(/\s/g,"");
                resultdocument.body.appendChild(style);
            }
            else {
                document.getElementById('editable').style.display = "table";
                document.getElementById('noneditable').style.display = "none";
                document.getElementById('showcorrect').style.display = "block";
                document.getElementById('hidecorrect').style.display = "none";
            }
        };
        function hideshow(which){
            if (!document.getElementById)
                return;
            if (which.style.display == "block")
                which.style.display = "none";
            else
                which.style.display = "block";
        }
    </script>
    <style>
        table,div.content,iframe{
            border:0;
            height:100%;
            margin:0;
            padding:0;
            width:100%;
        }
        td{
            border:2px solid black;
            height:50%;
            padding:25px 5px 5px 5px;
            position:relative;
            vertical-align:top;
            width:33%;
        }
        div.tag{
            position:absolute;
            right:5px;
            top:5px;
        }
    </style>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        <h1 class="page-header" style="text-transform: uppercase;">{{ $chapter->field }}. Chapter {{ $chapter->chapter_nr }}. {{ $chapter->chapter_name }}</h1>
        <h4>{!! nl2br(e($chapter->assignment)) !!}</h4>
        <a href="javascript:hideshow(document.getElementById('instructions'))" class="btn btn-default" style="margin-bottom: 10px;">Show/hide instructions</a>
        <br>
        <div id="instructions" @if((Auth::check()) && (Auth::user()->learning_style == 'pragmatist')) style="display: block" @else style="display: none" @endif>{!! nl2br(e($chapter->step_by_step)) !!}</div>
        <button id="showcorrect" onclick="result()" style="display: block" class="btn btn-success">Show correct answer</button>
        <button id="hidecorrect" onclick="result()" style="display: none" class="btn btn-info">Hide correct answer</button>
        <table id="editable" style="display: table">
            <tr>
                <td>
                    <div class="tag">HTML (Body)</div>
                    <div id="html" class="content" contenteditable></div>
                </td>
                <td>
                    <div class="tag">CSS</div>
                    <div id="css" class="content" contenteditable></div>
                </td>
                <td>
                    <div class="tag">Output</div>
                    <iframe id="output"></iframe>
                </td>
            </tr>
        </table>
        <table id="noneditable" style="display: none">
            <tr>
                <td>
                    <div class="tag">HTML (Body)</div>
                    <div id="resulthtml" class="content">{{ $chapter->html_correct }}</div>
                </td>
                <td>
                    <div class="tag">CSS</div>
                    <div id="resultcss" class="content">{{ $chapter->css_correct }}</div>
                </td>
                <td>
                    <div class="tag">Output</div>
                    <iframe id="resultoutput"></iframe>
                </td>
            </tr>
        </table>
        <br>
        @if(Auth::user())
            <a href="/chapter/next/{{ $chapter->field }}/{{ $next }}/practice" class="btn btn-success pull-right" style="margin-bottom: 10px; margin-left: 10px;">Next chapter</a>
        @else
            <a href="/chapter/{{ $chapter->field }}/{{ $next }}/practice" class="btn btn-success pull-right" style="margin-bottom: 10px; margin-left: 10px;">Next chapter</a>
        @endif
        <a href="/chapter/{{ $chapter->field }}/{{ $chapter->chapter_nr }}/theory" class="btn btn-primary pull-right" style="margin-bottom: 10px;">Theory</a>
        @if($chapter->chapter_nr != 1)
            <a href="/chapter/{{ $chapter->field }}/{{ $prev }}/practice" class="btn btn-default pull-right" style="margin-bottom: 10px; margin-right: 10px;">Previous chapter</a><br>
        @endif
    </div>
@endsection