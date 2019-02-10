<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function genre(){
		return $this->belongsTo('\App\Genre');
  	}

  	// public function reviews(){
   //  	return $this->belongsToMany('\App\Review', 'game_reviews')->withPivot('rating', 'comment')->withTimestamps();
   //  }
  	
}
