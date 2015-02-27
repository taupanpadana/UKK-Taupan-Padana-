@extends('layouts.default')
@section('body')
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Change Password for {{ $user->username }}</h2>
        {{ Form::open(array('url' => 'changepassword/'. $user->id .'/change' , 'method' => 'post')) }}
        <div class="form-group">
            {{Form::label('password','Password')}}
            {{Form::password('password',array('class' => 'form-control'))}}
            <span class="error-display">{{$errors->first('password')}}</span>
        </div>
        {{Form::submit('Change', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop