<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
   
    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function getDirectorySongsPathAttribute(){
        return asset('images/album_cover');
    }

    public function getFullSongPathAttribute(){
        return $this->directorySongsPath.'/'.$this->path;
    }
}
