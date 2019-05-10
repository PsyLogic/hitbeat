var formatTime = function (seconds){
    var time = Math.round(seconds);
    var minutes = Math.floor(time / 60);
    var seconds = time - (minutes * 60);

    var extraZero = (seconds < 10) ? '0' : '';

    return minutes + ':' + extraZero + seconds;
}

var updateProgress = function(audio){
    $('.progressTime.current').text(formatTime(audio.currentTime))
    $('.progressTime.remaining').text(formatTime(audio.duration - audio.currentTime))

    var playProgressBarWidth = audio.currentTime / audio.duration * 100;

    $('.playbackBar .progress').css('width',playProgressBarWidth + '%');
}

var updateVolumeBar = function(audio){
    var volume = audio.volume * 100;
    $('.volumeBar .progress').css('width',volume + '%');
}

var Audio = function(){

    this.isPlaying = false;
    this.audio = document.createElement('audio')
    this.repeat = false;
    this._this = this;

    this.audio.addEventListener('canplay', function(){
        var duration = formatTime(this.duration);
        $('.progressTime.remaining').text(duration);
    });
    
    this.audio.addEventListener('timeupdate', function(){
        if(this.duration){
            updateProgress(this)            
        }
    });
    
    this.audio.addEventListener('volumechange', function(){
        updateVolumeBar(this)
    });

    this.setTrack = function(src){
        this.audio.src = src;
    }

    this.play = function() {
        this.isPlaying = true;
        this.audio.play();
    }

    this.pause = function() {
        this.isPlaying = false;
        this.audio.pause();
    }

    this.setTime = function(time) {
        this.audio.currentTime = time;
    }

    this.getAudio = function(){
        return this.audio;
    }

    this.updateVolume = function(newVolume){
        this.audio.volume = newVolume;
    }

    this.enableRepeat = function (enabled){
        this.repeat = enabled;
    }

    this.getRepeatStatus = function(){
        return this.repeat;
    }

    this.mutedOnOff = function(){
        this.audio.muted = !this.audio.muted;
        return !this.audio.muted;
    }


}