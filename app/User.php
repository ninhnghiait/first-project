<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    // protected static $logAttributes = [
    //     'name', 'email',
    // ];

    // protected static $logOnlyDirty = true;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // RELATIONSHIP
    public function profile()
    {
        return $this->hasOne('App\Model\Profile');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'role_user');
    }
    
    // ATHORIZATION
    /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $name)
    {
        return !! $this->roles()->pluck('name')->contains($name);
    }

}
