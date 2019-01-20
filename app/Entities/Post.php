<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Post.
 *
 * @package namespace App\Entities;
 */
class Post extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'title', 'detail', 'published', 'user_id', 'counter', 'picture'
	];

	protected $cast = [
		'published' => 'boolean'
	];

	public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
