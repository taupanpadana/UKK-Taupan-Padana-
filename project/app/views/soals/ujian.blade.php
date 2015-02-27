@extends('layouts.default')
@section('body')
<div class="container">
	<div class="row">
	
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel-body">
				
					<?php $mapl = Mapel::all();?>				
					<h3 style="border-bottom: 2px solid #ddd;">Pilih Mata Pelajaran</h3>		
				@foreach($mapl as $value)
				<a class="btn btn-primary btn-lg btn-block" href="{{ URL::to('ujian/' . $value->id ). '/proses' }}">{{ $value->mata_pelajaran }}</a>
				@endforeach
			</div>
		
		</div>
	</div>
  	<div class="col-sm-9">
      <div class="panel panel-default">
			<div class="panel-body">
              		<div class="row">
                        <div class="col-xs-12">
                            <h2 class="text-center" style="border-bottom: 2px solid #ddd;">Peraturan Dalam Ujian</h2>
                            <div class="row">
		                            <p style="margin-left: 15px;">1. Jika anda menjawab benar maka nilai +10</p>
		                            <p style="margin-left: 15px;">2. Jika anda menjawab salah maka nilai -5</p>
		                            <p style="margin-left: 15px;">3. Jika anda melewati soal maka nilai 0</p>
		                            <p style="margin-left: 15px;">4. Soal yang telah dilewati tidak dapat di ulang dan dianggap melewati</p>
		                            <p>&nbsp;</p>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	</div>	
</div>

@stop