<div class="gridViewContainer">
    @foreach ($albums as $album)
    <div class="gridViewItem">
        <a href="{{route('album.show',$album->id)}}">
            <img src="{{ $album->fullCoverPath }}" alt="{{ $album->title }}" >
            <div class="gridViewInfo">
                {{$album->title}}
            </div>
        </a>
    </div>
    @endforeach
</div>