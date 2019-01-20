<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $perPage = 1;
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'avatar'
    ];

    protected $cast = [
        'name' => 'boolean'
    ];


    /**
     * Accessor fullname, avatar
     */
    protected $appends = ['full_name', 'avatar_user']; 

    public function getFullNameAttribute()
    {   
        return ($this->first_name != null || $this->last_name != null) ?  ($this->first_name.' '.$this->last_name) : $this->name;
    }
    public function getAvatarUserAttribute()
    {
        return (!is_null($this->avatar) && !empty($this->avatar)) ? $this->avatar : '/photos/1/users/!logged-user.jpg';
    }

    /**
     * The attributes that are activitylog.
     *
     * @var array
     */

    // protected static $logOnlyDirty = true;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
