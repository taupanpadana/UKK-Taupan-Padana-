@extends('layouts.default')
@section('body')
<div class="container">
<a class="btn btn-small btn-success" href="{{ URL::to('user/create') }}">+ User</a>
<p>&nbsp;</p>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td class="text-center"><strong>Username</strong></td>
            <td class="text-center"><strong>Kelas</strong></td>
            <td class="text-center"><strong>Aktif</strong></td>
            <td class="text-center"><strong>Status</strong></td>
            <td class="text-center"><strong>Actions</strong></td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $value)
        <tr>
            <td>{{ $value->username}}</td>
            <td>{{ $value->group['nama_kelas'] }}</td>
			@if($value->active)
			<td><center><a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id). '/nonaktifkan' }}">Aktif</a></center></td>
            @else	
            <td><center><a class="btn btn-small btn-danger" href="{{ URL::to('user/' . $value->id). '/aktifkan' }}">Tidak Aktif</a></center></td>
            @endif            
            
            @if($value->is_admin)
			<td><center><a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id). '/jadisiswa' }}">Admin</a></center></td>
			@elseif($value->is_guru === 1)
			<td><center><a class="btn btn-small btn-success" href="{{ URL::to('user/' . $value->id). '/jadiguru' }}">Guru</a></center></td>
            @else	
            <td><center><a class="btn btn-small btn-warning" href="{{ URL::to('user/' . $value->id). '/jadiadmin' }}">Siswa</a></center></td>
            @endif
             
            <td>
				{{ Form::open(array('url' => 'user/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-small btn-danger')) }}
                {{ Form::close() }}
                <a class="btn btn-small btn-success" href="{{ URL::to('profil/' . $value->id) }}">Lihat Profil</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id . '/edit') }}">Edit</a>
			
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@stop
