$(function(){
    var musicPath = '/music/';
    var audio = new Audio();
    var songs=[];
    var originSongsPlaylist=[];
    var songId;
    var mouseDown=false;
    var trackIndex=0;
    var shuffle = false;
    
    function init() {
        updateVolumeBar(audio.getAudio());
        
        audio.getAudio().addEventListener('ended', () =>{
            if(audio.getRepeatStatus()){
                audio.setTime(0);
                audio.play();
                return;
            }
            nextSong();
        });
    }

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

        $('.play-pause-song .fa-pause').hide()
        $('.play-pause-song .fa-play').show()
    }

    function playTrack(song,play=true){
        if(song === undefined && songs.length === 0 && songId === undefined){
            setRandomSong()
        }else{
            if(song !== undefined){
                audio.setTrack(musicPath+song.path);
                $('a.trackName').text(song.title);
                $('a.artistName').text(song.artist.name);
                $('a.albumName').text(song.album.title);
            }
            else if(songs.length > 0){
                audio.setTrack(musicPath+songs[0].path);
                $('a.trackName').text(songs[0].title);
                $('a.artistName').text(songs[0].artist.name);
                $('a.albumName').text(songs[0].album.title);
            }
        }
        
        if(play){
            audio.play();
            switchControl();
        }
    }

    function pauseTrack(){
        audio.pause();
        switchControl();
    }

    function previousSong(){
        if(songs.length > 0){
            if(audio.getAudio().currentTime >= 3 || trackIndex == 0){
                audio.setTime(0);
                audio.play();
            }else{
                trackIndex--;
                playTrack(songs[trackIndex]);
            }
            return;
        }
        
        audio.setTime(0);
        audio.play();
    }

    function nextSong(){
        if(songs.length > 0){
            trackIndex = (trackIndex === songs.length - 1) ? 0 : ++trackIndex;
            playTrack(songs[trackIndex]);
        }
    }

    function shufflePlaylist(playlist) {      
        var currentIndex = playlist.length;
        var temporaryValue, randomIndex;

        // While there remain elements to shuffle...
        while (0 !== currentIndex) {
            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = playlist[currentIndex];
            playlist[currentIndex] = playlist[randomIndex];
            playlist[randomIndex] = temporaryValue;
        }
        return playlist;   
    }

    function changeVolumeOffset(mouse, volumeBar){
        var percentage = mouse.offsetX / volumeBar.width();
        if(percentage >= 0 && percentage <= 1)
            audio.updateVolume(percentage);
    }

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

    $('.play').click(function() {
        playTrack()
    })
    
    $('.pause').click(function() {
        pauseTrack();
    });
    
    $('.next').click(function() {
        nextSong();
    });

    $('.previous').click(function() {
        previousSong();
    });
    
    $('.repeat').click(function() {
        if(audio.getRepeatStatus()){
            audio.enableRepeat(false);
            $('.fa-retweet').css('color','gray');
        }else{
            audio.enableRepeat(true);
            $('.fa-retweet').css('color','green');
        }
    });
    
    $('.shuffle').click(function() {
        shuffle = !shuffle;
        if(shuffle){
            $('.fa-random').css('color','green');
            originSongsPlaylist = songs;
            songs = shufflePlaylist(songs.slice());
        }else{
            $('.fa-random').css('color','gray');
            songs = originSongsPlaylist;
        }
    });



    $('.volume').click(function() {
        var muted = audio.mutedOnOff();
        if(muted){
            $('.fa-volume-up').show();
            $('.fa-volume-mute').hide();
        }else{
            $('.fa-volume-up').hide();
            $('.fa-volume-mute').show();
        }
    });

    $('.play-pause-song').click(function(){
        var _this = $(this);
        $('.play-pause-song .fa-pause').hide()
        $('.play-pause-song .fa-play').show()
        
        if(songId == _this.data('id') && audio.isPlaying){
            pauseTrack();
            return;
        }
        if(songId == _this.data('id')){
            playTrack();
            return;
        }

        songId = _this.data('id');
        $.ajax({
            type: 'GET',
            url: `/song/${songId}/play`,
            success: function(song){
                songs = [];
                trackIndex = 0;
                playTrack(song);
                _this.children('.fa-play').hide()
                _this.children('.fa-pause').show()
            },
            error: function(err){
                console.log(err);
            }
        });
    });

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
    
    $('.volumeBar .progressBar').mousedown(function () {
        mouseDown = true;
    })
    
    $('.volumeBar .progressBar').mousemove(function (e) {
        if(mouseDown)
        changeVolumeOffset(e,$(this))   
    })
    
    $('.volumeBar .progressBar').mouseup(function (e) {
        changeVolumeOffset(e,$(this))
    })

    $(document).mouseup(function() {
        mouseDown = false;
    })

    init();
});