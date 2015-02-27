@extends('layouts.default')
@section('body')
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Edit {{ $user->username }}</h2>
        {{ Form::open(array('route' => array('user.update', $user->id ), 'method' => 'PUT')) }}
        <div class="form-group">
            {{Form::label('username','Username')}}
            {{Form::text('username', $user->username ,array('class' => 'form-control'))}}
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
	        {{ Form::select('group_id', $kelas , $user->group->id , array('class' => 'form-control')) }}        
    	</div>
        <div class="form-group">
	        {{ Form::label('active', 'Aktif') }}	        
	        {{ Form::select('active', ['0'=> 'Tidak Aktif' , '1' => 'Aktif'] , $user->active , array('class' => 'form-control')) }}        
    	</div>        
        <div class="form-group">
	        {{ Form::label('is_guru', 'Guru') }}	        
	        {{ Form::select('is_guru', ['0'=> 'Bukan Guru' , '1' => 'Guru'] , $user->is_guru , array('class' => 'form-control')) }}        
    	</div>        
    	    	
        {{Form::submit('Update', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop