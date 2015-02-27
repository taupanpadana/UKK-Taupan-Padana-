@extends('layouts.default')
@section('body')
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Login</h2>
		{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
		<div class="form-group">
			{{Form::label('username','Username')}}
			{{Form::text('username', null, array('class' => 'form-control', 'placeholder'=>'Username'))}}
			<span class="error-display">{{$errors->first('username')}}</span>
    	</div>
        <div class="form-group">
            {{Form::label('password','Password')}}
            {{Form::password('password',array('class' => 'form-control' , 'placeholder'=>'Password'))}}
            <span class="error-display">{{$errors->first('password')}}</span>
        </div>
		{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
		{{ Form::close() }}
	</div>
</div>
@stop