<?php
class Nilai extends Eloquent {
	protected $table = 'nilai';
	public function user()
	{
		return $this->BelongsTo('User','user_id');
	}
	public function mapel()
	{
		return $this->BelongsTo('Mapel','mapel_id');
	}

} 