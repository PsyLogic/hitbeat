<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/hitbit.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    </head>
    <body>
        <div class="mainContainer">
            
            <div id="topContainer">
                <div class="sideBarContainer">
                    <nav class="sideBar">
                        <a href="#" class="logo">
                            <img src="{{asset('/images/logo.png')}}" alt="logo-hit-the-beat" >
                        </a>

                        <div class="group">
                            <div class="navItem">
                                <input type="text" class="navItemInput" placeholder="Search... "> 
                            </div>
                        </div>
                        
                        <div class="group">
                            <div class="navItem">
                                <a href="#" class="navItemLink">Browse</a>
                            </div>
                            <div class="navItem">
                                <a href="#" class="navItemLink">Your Music</a>
                            </div>
                            <div class="navItem">
                                <a href="#" class="navItemLink">Othmane Nemli</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="contentContainer"></div>
            </div>

            <div id="playerBarContainer">
                <div id="playerBar">
                    <div id="leftPlayerControls">
                        <div class="content">
                            <a href="#" class="albumLink">
                                <img src="https://media.cdr.nl/COVER/MEDIUM/FRONT/JK227386/KOD.jpg" alt="ALbum Pic" class="albumCover">
                            </a>
                            <div class="trackInfo">
                                <span class="trackName">
                                    <a href="#">Spiel</a>
                                </span>
                                <span class="artistName">
                                    <a href="#">Rammstein</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="centerPlayerControls">
                        <div class="content playerControls">
                            <div class="controls">
                                <button class="controlBtn shuffle" title="Shuffle">
                                    <i class="fas fa-random"></i>
                                </button>
                                <button class="controlBtn previous" title="Previous">
                                    <i class="far fa-arrow-alt-circle-left"></i>
                                </button>
                                <button class="controlBtn play" title="Play">
                                    <i class="far fa-play-circle"></i>
                                </button>
                                <button class="controlBtn pause" title="Pause" style="display:none;">
                                    <i class="far fa-pause-circle"></i>
                                </button>
                                <button class="controlBtn next" title="Next">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                </button>
                                <button class="controlBtn repeat" title="Repeat">
                                    <i class="fas fa-retweet"></i>
                                </button>
                            </div>
                            <div class="playbackBar">
                                <span class="progressTime current">0.00</span>
                                <div class="progressBar">
                                    <div class="progressBarBg">
                                        <div class="progress"></div>
                                    </div>
                                </div>
                                <span class="progressTime remaining">0.00</span>
                            </div>
                        </div>
                    </div>
                    <div id="rightPlayerControls">
                        <div class="volumeBar">
                            <button class="controlBtn volume" title="Volume">
                                <i class="fas fa-volume-up"></i>
                            </button>
                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
