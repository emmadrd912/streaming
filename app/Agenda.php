<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
  protected $fillable = [
      'name', 'release_date', 'episode_name', 'vote', 'comment', 'backdrop_path', 'poster_path', 'still_path',
  ];
}
