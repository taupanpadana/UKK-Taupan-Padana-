<?php
class Group extends Eloquent {
	protected $table = 'groups';
	public function user()
	{
		return $this->hasMany('User','group_id');
	}
	public function soal()
	{
		return $this->hasMany('Soal','group_id');
	}
	
}