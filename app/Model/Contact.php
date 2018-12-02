<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'name', 'email', 'phone', 'address', 'replyed'
    ];
    protected $cast = [
    	'replyed' => 'boolean'
    ];
}