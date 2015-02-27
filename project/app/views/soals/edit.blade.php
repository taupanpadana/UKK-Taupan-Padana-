@extends('layouts.default')
@section('body')
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Edit Soal</h2>
		<?php $mapl = Mapel::lists('mata_pelajaran', 'id');
			  $kelas = Group::lists('nama_kelas','id'); ?>
        {{ Form::open(array('route' => array('soal.update',$soal->id), 'method' => 'PUT')) }}

        <div class="form-group">
	        {{ Form::label('group_id', 'Pilih Kelas') }}	        
	        {{ Form::select('group_id', $kelas , $soal->group->id , array('class' => 'form-control')) }}        
    	</div>       
    	<div class="form-group">
	        {{ Form::label('mapel_id', 'Pilih Mata Pelajaran') }}        
	        {{ Form::select('mapel_id', $mapl , $soal->mapel->id, array('class' => 'form-control')) }}        
    	</div>      	
    	<div class="form-group">
			{{ Form::label('pertanyaan', 'Pertanyaan') }}        
	        {{ Form::textarea('pertanyaan', $soal->pertanyaan, array('class' => 'ckeditor')) }} 
            <!--{{Form::label('pertanyaan','Pertanyaan')}}
            {{Form::text('pertanyaan', $soal->pertanyaan, array('class' => 'form-control'))}}-->
            
        </div>
        <div class="form-group">
            {{Form::label('jawab_a','Jawaban A')}}
            {{Form::text('jawab_a', $soal->jawab_a, array('class' => 'form-control'))}}            
        </div>
        <div class="form-group">
            {{Form::label('jawab_b','Jawaban B')}}
            {{Form::text('jawab_b', $soal->jawab_b, array('class' => 'form-control'))}}            
        </div>    	
        <div class="form-group">
            {{Form::label('jawab_c','Jawaban C')}}
            {{Form::text('jawab_c', $soal->jawab_c, array('class' => 'form-control'))}}            
        </div>    	
        <div class="form-group">
            {{Form::label('jawab_d','Jawaban D')}}
            {{Form::text('jawab_d', $soal->jawab_d, array('class' => 'form-control'))}}            
        </div>
        <div class="form-group">
            {{Form::label('kunci_jawab','Kunci Jawaban')}}
            {{ Form::select('kunci_jawab', ['1'=>'A', '2'=>'B', '3' => 'C', '4' => 'D'], $soal->kunci_jawab, array('class' => 'form-control')) }}
        </div>    	        
        
        {{Form::submit('Update', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop