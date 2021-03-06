<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

/**
 * @property mixed $posts
 * @property int $perm_users
 * @property int $perm_posts
 * @property int $perm_events
 * @property int $perm_openings
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'perm_users', 'perm_posts', 'perm_events', 'perm_openings', 'perm_contact'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
	{
		return $this->hasMany(Post::class, 'author', 'id');
	}
}
