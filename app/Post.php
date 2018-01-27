<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property mixed $user
 */
class Post extends Model
{
    public function user()
	{
		return $this->belongsTo(User::class, 'author', 'id');
	}
}
