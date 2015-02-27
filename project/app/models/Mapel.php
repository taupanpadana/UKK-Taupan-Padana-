<?php
class Mapel extends Eloquent {
	protected $table = 'mapels';
	public function soal()
	{
		return $this->hasMany('Soal','mapel_id');
	}

} 