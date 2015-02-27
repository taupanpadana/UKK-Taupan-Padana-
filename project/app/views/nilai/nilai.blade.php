@extends('layouts.default')
@section('body')
<div class="container">
<p>&nbsp;</p>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
			<td class="text-center"><strong>Nama User</strong></td>
			<td class="text-center"><strong>Kelas</strong></td>
			<td class="text-center"><strong>Mata Pelajaran</strong></td>
            <td class="text-center"><strong>Jawaban Benar</strong></td>
            <td class="text-center"><strong>Jawaban Salah</strong></td>
            <td class="text-center"><strong>Nilai</strong></td>
			<td class="text-center"><strong>Action</strong></td>
        </tr>
    </thead>
    <tbody>
    @foreach($nilai as $value)
        <tr>
			<td><center>{{ $value->user['username'] }}</center></td>
			<td><center>{{ $value->user['group_id'] }}</center></td>
			<td><center>{{ $value->mapel['mata_pelajaran'] }}</center></td>
            <td><center>{{ $value->benar }}</center></td>
            <td><center>{{ $value->salah }}</center></td>
            <td><center>{{ $value->nilai }}</center></td>
			<td><center>
				{{ Form::open(array('url' => 'nilai/' . $value->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td></center>

        </tr>
    @endforeach
    </tbody>
</table>
</div>
@stop
