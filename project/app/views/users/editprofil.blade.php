@extends('layouts.default')
@section('body')
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Edit Profile</h2>
		<?php $mapl = Mapel::lists('mata_pelajaran', 'id');
			  $kelas = Group::lists('nama_kelas','id'); ?>
        {{ Form::open(array('route' => array('user.update',$user->id), 'method' => 'PUT')) }}

        <div class="form-group">
	        {{ Form::label('nama_lengkap', 'Nama Lengkap') }}	        
	        {{ Form::text('nama_lengkap',$user->group->id , array('class' => 'form-control')) }}        
    	</div>       
   	        
        
        {{Form::submit('Update', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop