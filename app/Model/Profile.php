<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'secondary_email', 'address', 'secondary_address', 'birthday', 'job', 'gender', 'about', 'facebook', 'google_plus', 'twitter', 'skype', 'website' , 'country_code', 'phone_number'
    ];

    protected $dates = ['birthday'];

}
