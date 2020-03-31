<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
  protected $fillable = [
      'path','episode_name', 'episode_id', 'episode_season', 'vote', 'release_date', 'comment', 'serie_name'
  ];
}
