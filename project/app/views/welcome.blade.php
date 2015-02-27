@extends('layouts.default')
@section('body')
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2 class="text-center"> Selamat Datang, {{ Auth::user()->username }} </h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop