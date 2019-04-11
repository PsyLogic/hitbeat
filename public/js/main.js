$(function(){
    var musicPath = '/music/';
    var audio = new Audio();
    var songs=[];
    var songId;
    var mouseDown=false;

    function timeFromOffset(mouse, progressBar){
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audio.audio.duration * (percentage / 100);
        audio.setTime(seconds);
    }

    function switchControl(){
        if(audio.isPlaying){
            $('.play').hide();
            $('.pause').show();
            
        }else{
            $('.play').show();
            $('.pause').hide();
        }
    }

    function playTrack(filename,play=true){
        if(filename === undefined && songs.length === 0 && songId === undefined)
            setRandomSong()
        
        if(songs.length > 0)
            audio.setTrack(musicPath+songs[0].path);
        else if(filename !== undefined)
            audio.setTrack(musicPath+filename);

        if(play){
            audio.play();
            switchControl();
        }
    }


    function pauseTrack(){
        audio.pause();
        switchControl();
    }

    $('.play').click(function() {
        playTrack()
    })
    
    $('.pause').click(function() {
        pauseTrack();
    })

    $('.play-pause-song').click(function(){
        
        if(songId == $(this).data('id') && audio.isPlaying){
            pauseTrack();
            return;
        }
        if(songId == $(this).data('id')){
            playTrack();
            return;
        }

        songId = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: `/song/${songId}/play`,
            success: function(song){
                $('a.trackName').text(song.title);
                $('a.artistName').text(song.artist.name);
                $('a.albumName').text(song.album.title);
                songs = [];
                playTrack(song.path);
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    function setRandomSong(){
        $.ajax({
            type: 'GET',
            url: `/song/random`,
            success: function(songsCollection){
                $.each(songsCollection, function(key,song){
                    songs.push(song);
                })
                playTrack()
            },
            error: function(err){
                console.log(err);
            }
        });
    }


    $('.playbackBar .progressBar').mousedown(function () {
        mouseDown = true;
    })
    
    $('.playbackBar .progressBar').mousemove(function (e) {
        if(mouseDown)
            timeFromOffset(e,this)
    })
    
    $('.playbackBar .progressBar').mouseup(function (e) {
        timeFromOffset(e,this)
    })

    $(document).mouseup(function() {
        mouseDown = false;
    })

});