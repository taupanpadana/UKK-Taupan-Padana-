<?php $tgl_lahir = PilihTanggal::tgl_indo($user->profile['tanggal_lahir']); ?>
@extends('layouts.default')
@section('body')
<div>
<div class="container">
  <div class="row">
  	<div class="col-md-12">
      <div class="panel panel-default">
			<div class="panel-body">
              		<div class="row">
                        <div class="col-xs-12 col-sm-9">
                            <h2 class="text-right" style="border-bottom: 2px solid #ddd;">{{$user->group->nama_kelas}}</h2>
                            <div class="row">
                            	<div class="col-xs-12 col-sm-3">
		                            <p class="text-right"><strong>Jenis Kelamin : </strong></p>
		                            <p class="text-right"><strong>Tempat, Tanggal lahir : </strong></p>
		                            <p class="text-right"><strong>Alamat : </strong></p>
		                            <p class="text-right"><strong>Kelurahan : </strong> </p>
		                            <p class="text-right"><strong>Kecamatan : </strong></p>
		                            <p class="text-right"><strong>Kode Pos : </strong></p>
		                            <p class="text-right"><strong>Kota : </strong> </p>
		                            <p class="text-right"><strong>Nama Ayah : </strong> </p>
		                            <p class="text-right"><strong>Pekerjaan Ayah : </strong> </p>
		                            <p class="text-right"><strong>Nama Ibu : </strong> </p>
		                            <p class="text-right"><strong>Pekerjaan Ibu : </strong> </p>
		                            <p class="text-right"><strong>No Telp : </strong> </p>
		                            <p>&nbsp;</p>
	                            </div>
	                            <div class="col-xs-12 col-sm-9">
	                             	<p>{{ $user->profile['gender'] }}</p>
	                             	<p>{{ $user->profile['tempat_lahir'],', ', $tgl_lahir }}</p>
	                             	<p>{{ $user->profile['alamat'] }}</p>
	                             	<p>{{ $user->profile['kelurahan'] }}</p>
	                             	<p>{{ $user->profile['kecamatan'] }}</p>
	                             	<p>{{ $user->profile['kode_pos'] }}</p>
	                             	<p>{{ $user->profile['kota'] }}</p>
	                             	<p>{{ $user->profile['nama_ayah'] }}</p>
	                             	<p>{{ $user->profile['pekerjaan_ayah'] }}</p>
	                             	<p>{{ $user->profile['nama_ibu'] }}</p>
	                             	<p>{{ $user->profile['pekerjaan_ibu'] }}</p>
	                             	<p>{{ $user->profile['no_telp'] }}</p>
	                             	<p>&nbsp;</p>
	                             	
	                            </div>
                            </div>
                        </div><!--/col-->          
                        <div class="col-xs-12 col-sm-3 text-center">
                                <img src="{{$user->profile['foto']}}" alt="" class="center-block img-circle img-responsive">
                                <h2>{{$user->profile['nama_lengkap']}}</h2>
                        </div><!--/col-->
                        <div class="col-xs-12 col-sm-6">
                            <a class="btn btn-success btn-block" href="{{ URL::to('editprofil/' . $user->id ) }}"><span class="fa fa-plus-circle"></span> Edit Profile </a>
                        </div><!--/col-->
                        <div class="col-xs-12 col-sm-6">
                            <a class="btn btn-info btn-block" href="{{ URL::to('changepassword/' . $user->id) }}"><span class="fa fa-user"></span> Change Password </a>
                        </div><!--/col-->
              		</div><!--/row-->
              </div><!--/panel-body-->
          </div><!--/panel-->    
    </div>
  </div>
</div>
</div>
@stop