@extends('layouts.inner')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Quiz</h1>
        <div class="col-md-offset-2">
            <h2>Please, take a short quiz so we can define your learning style!</h2>
            <p>Tick a box if you think that the statement is true for you.</p>
            {{ Form::open(array('class' => 'form-quiz', 'route' => 'stylesQuizResults')) }}

            <ol>
                <div>
                    {{ Form::checkbox('q1') }}
                    {{ Form::label('q1', 'I find it easy to meet new people and make new friends', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q2') }}
                    {{ Form::label('q2', 'I am cautious and thoughtful', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q3') }}
                    {{ Form::label('q3', 'I get bored easily', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q4') }}
                    {{ Form::label('q4', 'I am a practical, “hands on” kind of person', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q5') }}
                    {{ Form::label('q5', 'I like to try things out for myself', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q6') }}
                    {{ Form::label('q6', 'My friends consider me to be a good listener', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q7') }}
                    {{ Form::label('q7', 'I have clear ideas about the best way to do things', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q8') }}
                    {{ Form::label('q8', 'I enjoy being the centre of attention', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q9') }}
                    {{ Form::label('q9', 'I am a bit of a daydreamer', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q10') }}
                    {{ Form::label('q10', 'I keep a list of things to do', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q11') }}
                    {{ Form::label('q11', 'I like to experiment to find the best way to do things', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q12') }}
                    {{ Form::label('q12', 'I prefer to think things out logically', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q13') }}
                    {{ Form::label('q13', 'I like to concentrate on one thing at a time', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q14') }}
                    {{ Form::label('q14', 'People sometimes think of me as shy and quiet', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q15') }}
                    {{ Form::label('q15', 'I am a bit of a perfectionist', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q16') }}
                    {{ Form::label('q16', 'I am enthusiastic about life', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q17') }}
                    {{ Form::label('q17', 'I would rather “get on with the job” than keep talking about it', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q18') }}
                    {{ Form::label('q18', 'I often notice things that other people miss', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q19') }}
                    {{ Form::label('q19', 'I act first then think about the consequences later', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q20') }}
                    {{ Form::label('q20', 'I like to have everything in its “proper place”', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q21') }}
                    {{ Form::label('q21', 'I ask lots of questions', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q22') }}
                    {{ Form::label('q22', 'I like to think things through before getting involved', array('class' => 'quizlabel')) }}
                </div><div>
                    {{ Form::checkbox('q23') }}
                    {{ Form::label('q23', 'I enjoy trying out new things', array('class' => 'quizlabel')) }}
                </div>
                <div>
                    {{ Form::checkbox('q24') }}
                    {{ Form::label('q24', 'I like the challenge of having a problem to solve', array('class' => 'quizlabel')) }}
                </div>
            </ol>

            {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection