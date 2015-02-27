@extends('layouts.default')
@section('body')
{{HTML::script('assets/js/jquery.countdown.pack.js')}}
{{HTML::script('assets/js/jquery.countdown-id.js')}}


<script type="text/javascript">
$(document).ready(function(){

	function highlightLast5(periods) {
	    if ($.countdown.periodsToSeconds(periods) == 30) {
	        $(this).addClass('highlight');
	    }
	}

	function liftOff() {

	 	alert('Waktu sudah habis');
		//alert('Maaf waktu anda sudah habis, kami melanjutkan pertanyaan berikutnya');
		nextQuestion();

		itungitung();
		//document..submit();
	}

	function watchCountdown(periods) {
	    $('#monitor').text('Waktu yang anda miliki ' + periods[5] + ' menit dan ' +
	        periods[6] + ' detik lagi');
	}

	var idQuestion = 1;
	var noSoal = 1;
	var totaljawabanbetul = 0;
	var totaljawabansalah = 0;
	var totaljawabanpas = 0;
	var skor = 0;
	var jawabanYangDipilih;

	$('.button-pilihan-jawaban a').click(function() {
		$('.button-pilihan-jawaban a').removeClass('selected-answer');
		$(this).addClass('selected-answer');
	});

	function show(id){
		$('#nomor-soal').html(id);
		$('#pertanyaan-'+id).fadeIn();
		$('#jawaban-button-'+id).fadeIn();
		idQuestion++;
		noSoal++;
	};

	function findAswer(id){

		jawabanYangDipilih = $('.button-pilihan-jawaban').find('a.selected-answer');

			if(jawabanYangDipilih.hasClass('jawabanbetul')){
				totaljawabanbetul++;
			}else if(jawabanYangDipilih.hasClass('jawabansalah')){
				totaljawabansalah++;
			}else if(jawabanYangDipilih.length == 0){
				totaljawabanpas++;
			}


		$('.holder-jawabanBetul').html(totaljawabanbetul);
		$('.holder-jawabanSalah').html(totaljawabansalah);
		$('.holder-jawabanPas').html(totaljawabanpas);
		return false;
	}

	function itungitung(){
		skor = (totaljawabanbetul*10)+(totaljawabansalah*-5)+(totaljawabanpas*0);
		$('.holder-skor').html(skor);
		betul = totaljawabanbetul ;
		salah = totaljawabansalah ;
	}

	function nextQuestion(){
		var idJawab = idQuestion - 1;
		$('.soal-entry').fadeOut();
		show(idQuestion);
		findAswer(noSoal);

		$('.button-pilihan-jawaban a').removeClass('selected-answer');

		$('#jawaban-button-'+idJawab).fadeOut();
	}


	$('.button-next-quizz').click(function() {
		if(noSoal == 11){
			findAswer(noSoal);
			itungitung();
			showresult()

		}else{
			nextQuestion();

			itungitung();
		}

	});

	$('#start-quizz-btn').click(function() {
		$('.input-notification').hide();
		$('#status-history').show();
		show(1);
		$('#welcome-quiz').fadeOut();
		shortly = new Date();
	    	shortly.setMinutes(shortly.getMinutes() + <?php echo $timeset;?>);
		$('#timeBox').countdown('change', {until: shortly});
		$('#timeBox').countdown({until: shortly,
	    	onExpiry: liftOff, onTick: highlightLast5,significant: 2});
	});



	function showresult(){
		$('.input-notification').show();
		$('#timeBox').countdown('destroy');

		//hide element
		$('.quizz-info').hide();
		$('.detail-quizz').fadeOut();

		$('#timeBox').fadeOut();
		$('.button-next-quizz').hide();
		$('.skor-quiz-sementara').fadeOut();

		//show element
		$('.quizz-info-left').fadeIn();
		$('.skor-info-left').fadeIn();
		$('.soal-entry').hide();
		$('.button-selesai-quizz').show();
		$('.button-pilihan-jawaban').hide();
		$('#menu_list_top_pembelajaran').fadeOut();

		$('#status-history').html("Jawaban Betul : " + betul + " |  Jawaban Salah : "+ salah);
		
		//upddate link to download button
		$("#selesai").show();
		$("#ok").replaceWith("<a id='ok' href='<?php echo URL::to('nilai'); ?>/<?php echo $mapl->id; ?>/" + betul + "/" + salah + "/" + skor +"'>SELESAI</a>");
	}

});
</script>

<div class="container">
	<div class="row">			
		<div class="col-sm-3">
			<div class="panel panel-default">
				<div class="panel-body">
				
	              		<div class="row">
	                        <div class="col-xs-12">
	                            <h2 class="text-center" style="border-bottom: 2px solid #ddd;">Peraturan Ujian</h2>
	                            <div class="row">
			                            <p style="margin-left: 15px;">1. Jika jawaban benar maka nilai +10</p>
			                            <p style="margin-left: 15px;">2. Jika jawaban salah maka nilai -5</p>
			                            <p style="margin-left: 15px;">3. Jika anda melewati soal maka nilai 0</p>
			                            <p style="margin-left: 15px;">4. Soal yang telah terlewat tidak dapat di ulang</p>
			                            <p>&nbsp;</p>
								</div>
							</div>
						</div>			
				
				</div>
			</div>
		</div>
	
		<div class="col-sm-7">
			<div class="panel panel-default">
				<div class="panel-body">
				<h4 style="border-bottom: 2px solid #ddd;">Mata Pelajaran : {{ $mapl->mata_pelajaran }}</h4>
				<h4 id="status-history" style="display: none;">Nomor : <span id="nomor-soal">1</span></h4>		
				<div id="welcome-quiz" style="text-align:center;width:100%;padding:70px 0 0;">
					<h4 style="margin:0 0 30px 0;">Apakah anda sudah siap untuk mengerjakan Tryout ini ?</h4>
					<a id="start-quizz-btn" href="#" style="margin:0 15px 0 0;">OKE</a>
					<a href="{{URL::to('ujian')}}">TIDAK</a>
				</div>
				<?php $no = 0; ?>				
				@foreach($soal as $value)
					<?php $no ++ ;?>
					<div id="pertanyaan-<?php echo $no;?>" class="soal-entry clearfix" style="display:none;">
					<p><span> {{ $value->pertanyaan }}</span></p>
					<p>a. {{$value->jawab_a}}</p><?php if($value->kunci_jawab==1){echo " <span class='input-notification success png_bg'></span>";}?>
					<p>b. {{$value->jawab_b}}</p><?php if($value->kunci_jawab==2){echo " <span class='input-notification success png_bg'></span>";}?>
					<p>c. {{$value->jawab_c}}</p><?php if($value->kunci_jawab==3){echo " <span class='input-notification success png_bg'></span>";}?>
					<p>d. {{$value->jawab_d}}</p><?php if($value->kunci_jawab==4){echo " <span class='input-notification success png_bg'></span>";}?>
					</div>
					
					<div class="row">
					<div id="jawaban-button-<?php echo $no;?>" style="display:none;" > <center><div class="button-pilihan-jawaban clearfix">
					<a class="aoption btn btn-small btn-info <?php if($value->kunci_jawab==1){echo 'jawabanbetul';}else{echo 'jawabansalah';}?>" href="#">A</a>
					<a class="boption btn btn-small btn-info <?php if($value->kunci_jawab==2){echo 'jawabanbetul';}else{echo 'jawabansalah';}?>" href="#">B</a>
					<a class="coption btn btn-small btn-info <?php if($value->kunci_jawab==3){echo 'jawabanbetul';}else{echo 'jawabansalah';}?>" href="#">C</a>
					<a class="doption btn btn-small btn-info <?php if($value->kunci_jawab==4){echo 'jawabanbetul';}else{echo 'jawabansalah';}?>" href="#">D</a><br><br>
					</div></center></div>
					
					</div>

					
					
				@endforeach
				
				<div id="selesai" style="display: none;"><a id="ok" href="#">SELESAI</a>					
				</div>
				
				</div>
			</div>
		</div>
		
		<div class="col-sm-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="timeBox"></div>
				</div>
			</div>
		</div>		
		<div class="col-sm-2">
			<div class="">
				<div class="panel-body">
					<a class="button-next-quizz btn btn-info " id="next-btn" href="#" style="right:20px;top:115px;">NEXT</a>
				</div>
			</div>
		</div>

	
	</div>	
	<div id="status-history">
	
	</div>
	
	<div class="skor-quiz-sementara">
					SKOR SAMPAI SAAT INI : (<span class="holder-jawabanBetul">0</span> X 4 ) + (<span class="holder-jawabanSalah">0</span> X -1) + (<span class="holder-jawabanPas">0</span> X 0) = <span class="holder-skor">0</span>
	</div>

		
</div>
@stop