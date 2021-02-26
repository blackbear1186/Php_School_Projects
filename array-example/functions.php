<?php
function getBowlingRank($bowlingScore){
    if($bowlingScore >= 300){
        return 'Chuck Norris';
    } elseif($bowlingScore>= 225){
        return 'Professional';
    } elseif($bowlingScore >= 175){
        return 'Semi-Pro';
    } elseif($bowlingScore >= 125){
        return 'League Bowler';
    } else {
        return 'Wannabe';
    }
}
