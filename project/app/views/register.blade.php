@extends('layouts.default')
@section('body')
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Register</h2>

        {{ Form::open(array('url' => 'register', 'method' => 'post')) }}
        <div class="form-group">
            {{Form::label('username','Username')}}
            {{Form::text('username', null, array('class' => 'form-control'))}}
            <span class="error-display">{{$errors->first('username')}}</span>
        </div>
        <div class="form-group">
            {{Form::label('password','Password')}}
            {{Form::password('password',array('class' => 'form-control'))}}
            <span class="error-display">{{$errors->first('password')}}</span>
        </div>
        <div class="form-group">
        {{ Form::label('group_id', 'Pilih Kelas') }}
        <?php $kelas = Group::lists('nama_kelas','id'); ?>
        {{ Form::select('group_id', $kelas , Input::old('group_id'), array('class' => 'form-control')) }}        
    	</div>
        {{Form::submit('Register', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop