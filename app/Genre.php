<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    

    public function albums(){
        return $this->hasMany(Album::class);
    }

    public function songs(){
        return $this->hasMany(Song::class);
    }

}
