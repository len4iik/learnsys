@extends('layouts.inner')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Edit User profile</h1>
        <div class="col-md-6 col-md-offset-2">
            {{Form::open(array('route' => 'updateProfile'))}}

            <div class="span8">
                <div class="form-group">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name',$user->name, array('class'=>'form-control')) }}
                    @if( $errors->has('name'))
                        <p style="color: red;">{{ $errors->first('name') }}</p>
                    @endif

                    {{ Form::label('surname', 'Surname:') }}
                    {{ Form::text('surname', $user->surname, array('class'=>'form-control')) }}
                    @if( $errors->has('surname'))
                        <p style="color: red;">{{ $errors->first('surname') }}</p>
                    @endif

                    {{ Form::label('date', 'Birth Date:') }}
                    {{ Form::input('date','birth_date' , $user->birth_date, array('class' => 'form-control', 'id' => 'birth')) }}

                    {{ Form::label('learning_style', 'Learning style:') }}
                    {{ Form::select('learning_style', array('theorist' => 'Theorist', 'reflector' => 'Reflector', 'pragmatist' => 'Pragmatist', 'activist' => 'Activist'), $user->learning_style, array('class'=>'form-control')) }}
                    @if( $errors->has('learning_style'))
                        <p style="color: red;">{{ $errors->first('learning_style') }}</p>
                    @endif

                </div>
            </div>

            {{ Form::submit('submit', array('class'=>'btn btn-primary pull-right'))}}
            {{ Form::close() }}
        </div>
    </div>
@endsection