<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogfree extends Model
{
    protected $guarded = [
        'id'
      ];
    public $timestamps = true;
    
    public function content()
    {
        return $this->belongsTo('App\Content', 'contentid', 'contentid');
    }

    public function serie()
    {
        return $this->belongsTo('App\Serie', 'episode_id', 'episode_id');
    }

    public function getMediaAttribute() {
      if($this->content_id != null) {
        return $this->content();
      }
      return $this->serie();
    }
}
