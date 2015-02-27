@extends('layouts.default')
@section('body')
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div>
    <div class="col-md-4 col-md-offset-4">
        <h2>Buat Soal Baru</h2>
		<?php $mapl = Mapel::lists('mata_pelajaran', 'id');
			  $kelas = Group::lists('nama_kelas','id'); ?>
        {{ Form::open(array('route' => array('soal.store'), 'method' => 'post')) }}

        <div class="form-group">
	        {{ Form::label('group_id', 'Pilih Kelas') }}        
	        {{ Form::select('group_id', $kelas , Input::old('group_id'), array('class' => 'form-control')) }}        
    	</div>        
    	<div class="form-group">
	        {{ Form::label('mapel_id', 'Pilih Mata Pelajaran') }}        
	        {{ Form::select('mapel_id', $mapl , Input::old('mapel_id'), array('class' => 'form-control')) }}        
    	</div>      	
    	<div class="form-group">
			{{ Form::label('pertanyaan', 'Pertanyaan') }}        
	        {{ Form::textarea('pertanyaan', null, array('class' => 'ckeditor')) }} 
            <!--<textarea class="ckeditor" name="pertanyaan">
			</textarea>-->
        </div>
        <div class="form-group">
            {{Form::label('jawab_a','Jawaban A')}}
            {{Form::text('jawab_a', null, array('class' => 'form-control'))}}            
        </div>
        <div class="form-group">
            {{Form::label('jawab_b','Jawaban B')}}
            {{Form::text('jawab_b', null, array('class' => 'form-control'))}}            
        </div>    	
        <div class="form-group">
            {{Form::label('jawab_c','Jawaban C')}}
            {{Form::text('jawab_c', null, array('class' => 'form-control'))}}            
        </div>    	
        <div class="form-group">
            {{Form::label('jawab_d','Jawaban D')}}
            {{Form::text('jawab_d', null, array('class' => 'form-control'))}}            
        </div>
        <div class="form-group">
            {{Form::label('kunci_jawab','Kunci Jawaban')}}
            {{ Form::select('kunci_jawab', ['1'=>'A', '2'=>'B', '3' => 'C', '4' => 'D'], Input::old('kunci_jawab'), array('class' => 'form-control')) }}
        </div>    	        
        
        {{Form::submit('Submit', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop