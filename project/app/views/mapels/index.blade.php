@extends('layouts.default')
@section('body')
<div class="container">
<a class="btn btn-small btn-success" href="{{ URL::to('mapel/create') }}">+ Mata Pelajaran</a>
<p>&nbsp;</p>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<td class="text-center"><strong>No</strong></td>
            <td class="text-center"><strong>Nama Mata Pelajaran</strong></td>
			<td class="text-center"><strong>Waktu Pengerjan Soal</strong></td>
            <td class="text-center"><strong>Actions</strong></td>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    @foreach($mapels as $value)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $value->mata_pelajaran }}</td>
			<td>{{ $value->waktu_ujian }}</td>
            <td>
				{{ Form::open(array('url' => 'mapel/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                <a class="btn btn-small btn-success" href="{{ URL::to('mapel/' . $value->id) }}">Show</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('mapel/' . $value->id . '/edit') }}">Edit</a>

            </td>
        </tr>
        <?php $no++ ;?>
    @endforeach
    </tbody>
</table>
</div>
@stop
