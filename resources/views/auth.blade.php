@extends('layouts.outer')

@section('content')
    @if (Session::has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif
    @if (Session::has('good'))
        <div class="alert alert-danger">{{ Session::get('good') }}</div>
    @endif
    <div class="col-md-offset-4 col-md-4 well">
        <img src="../../../img/LU_emblem.png" class="logo">
        {{ Form::open(array('class' => 'form-signin', 'route' => 'loginUser')) }}
        <div class="form-group">
            {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
        </div>

        {{ Form::submit('Log in', array('class'=>'btn btn-lg btn-primary btn-block'))}}
        {{ Form::close() }}
        <a class="col-md-5" href="/signup">First time?! Sign up</a>
    </div>
@endsection
