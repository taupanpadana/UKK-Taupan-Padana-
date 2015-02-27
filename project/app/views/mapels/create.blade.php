@extends('layouts.default')
@section('body')
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Buat Mata Pelajaran Baru</h2>
        {{ Form::open(array('route' => array('mapel.store'), 'method' => 'post')) }}
     	
    	<div class="form-group">
            {{Form::label('mata_pelajaran','Mata Pelajaran')}}
            {{Form::text('mata_pelajaran', null, array('class' => 'form-control'))}}
            
        </div> 
		
		<div class="form-group">
            {{Form::label('waktu_ujian','Waktu Ujian/menit')}}
            {{Form::text('waktu_ujian', null, array('class' => 'form-control'))}}
            
        </div>
        
        {{Form::submit('Submit', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop