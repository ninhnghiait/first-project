<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }
}
