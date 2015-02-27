@extends('layouts.default')
@section('body')
<div class="container">
<a class="btn btn-small btn-success" href="{{ URL::to('soal/create') }}">+ Soal</a>
<p>&nbsp;</p>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td class="text-center"><strong>Mapel</strong></td>
            <td class="text-center"><strong>Kelas</strong></td>
            <td class="text-center"><strong>Pertanyaan</strong></td>
            <td class="text-center"><strong>A</strong></td>
            <td class="text-center"><strong>B</strong></td>
            <td class="text-center"><strong>C</strong></td>
            <td class="text-center"><strong>D</strong></td>
            <td class="text-center"><strong>Kunci</strong></td>
            <td class="text-center"><strong>Action</strong></td>
        </tr>
    </thead>
    <tbody>
    @foreach($soals as $value)
	<?php switch ($value->kunci_jawab) {
       case 1: $jawab = 'A';
          break;
       case 2: $jawab = 'B';
          break;
       case 3: $jawab = 'C';
          break;
       case 4: $jawab = 'D';
          break;
       // etc.
}?>
        <tr>
            <td>{{ $value->mapel['mata_pelajaran'] }}</td>
            <td>{{ $value->group['nama_kelas'] }}</td>
            <td class="col-lg-4" >{{ $value->pertanyaan }}</td>
            <td>{{ $value->jawab_a }}</td>
            <td>{{ $value->jawab_b }}</td>
            <td>{{ $value->jawab_c }}</td>
            <td>{{ $value->jawab_d }}</td>
            <td>{{ $jawab }}</td>
            <td class="col-lg-2" >
				{{ Form::open(array('url' => 'soal/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}                
                <a class="btn btn-small btn-info" href="{{ URL::to('soal/' . $value->id . '/edit') }}">Edit</a>
			
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
</div>
@stop
