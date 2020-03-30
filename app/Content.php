<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'path','contentname', 'contentid', 'comment', 'vote', 'release_date'
    ];
}
