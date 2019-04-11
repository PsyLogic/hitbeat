<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    
    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function songs(){
        return $this->hasMany(Song::class);
    }

    public function SongsCount(){
        return $this->songs->count();
    }

    public function getDirectoryCoversPathAttribute(){
        return asset('images/album_cover');
    }

    public function getFullCoverPathAttribute(){
        return $this->directoryCoversPath.'/'.$this->cover;
    }
    
}
