@extends('layouts.app')
@section('content')
    <div class="entityInfo">
        <div class="leftSecttion">
            <img src="{{ $album->FullCoverPath }}" alt="{{ $album->title }}"> 
        </div>
        <div class="rightSecttion">
            <h2>{{ $album->title }}</h2>
            <p>By {{ $album->artist->name }}</p>
            <p>{{$album->SongsCount() }} Songs</p>
        </div>
    </div>

    <div class="tracklistContainer">
        <ul class="tracklist">
            @foreach ($album->songs as $song)
                <li class="tracklistRow">
                    <div class="trackCount play-pause-song" data-id="{{$song->id}}">
                        <i class="fas fa-play"></i>
                        <i class="fas fa-pause" style="display:none;"></i>
                        <span class="trackNumber">{{$loop->iteration}}</span>
                    </div>
                    <div class="trackInfo">
                        <span class="trackName">{{ $song->title }}</span>
                        <span class="artistName">{{ $song->artist->name }}</span>
                    </div>

                    <div class="trackOptions">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>

                    <div class="trackDuration">
                        <span class="duration">{{ $song->duration }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection