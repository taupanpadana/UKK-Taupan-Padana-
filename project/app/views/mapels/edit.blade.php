@extends('layouts.default')
@section('body')
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Ubah Mata Pelajaran</h2>
        {{ Form::open(array('route' => array('mapel.update', $mapel->id), 'method' => 'PUT')) }}
     	
    	<div class="form-group">
            {{Form::label('mata_pelajaran','Mata Pelajaran')}}
            {{Form::text('mata_pelajaran', $mapel->mata_pelajaran, array('class' => 'form-control'))}}
            
        </div>   

		<div class="form-group">
            {{Form::label('waktu_ujian','Waktu Pengerjaan Soal')}}
            {{Form::text('waktu_ujian', $mapel->waktu_ujian, array('class' => 'form-control'))}}
            
        </div>  
        
        {{Form::submit('Update', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop