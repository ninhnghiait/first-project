<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FullTextSearchTraits;

class FullTextSearch extends Model
{
    /**
     * The columns of the full text index
     */
    use FullTextSearchTraits;
    protected $searchable = [
        'first_name',
        'last_name',
        'email'
    ];
}
