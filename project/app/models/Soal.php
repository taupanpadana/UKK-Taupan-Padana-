<?php
class Soal extends Eloquent {
	protected $table = 'soals';
	public function mapel()
	{
		return $this->BelongsTo('Mapel', 'mapel_id');
	}
	public function group()
	{
		return $this->BelongsTo('Group', 'group_id');
	}
}