/** ----------------------------------------- **\
 *  @file     Seconds System
 *
 *  @date     12.05.2017
 *  @author   Alessandro Narciso & Loris Bruno
\** ----------------------------------------- **/

/**
 * Document Ready (main)
 */
$(document).ready(function() {
  // Starts the seconds.
  $(function() {startSeconds();});

  /**
   * Starts the seconds.
   */
  window.startSeconds = function(){
    // Starts the interval for the seconds
    localSecondsInterval = setInterval(secManager,100);
  }

  window.secManager = function() {
   // Gets the current seconds.
   seconds = new Date().getSeconds();
   // Resets the seconds.
   resetSeconds();
   // Checks the current seconds and sets the color.
   if(seconds >= 55){
     document.getElementById("s55").style.color = onLedColor;
   }
   if(seconds >= 50){
     document.getElementById("s50").style.color = onLedColor;
   }
   if(seconds >= 45){
     document.getElementById("s45").style.color = onLedColor;
   }
   if(seconds >= 40){
     document.getElementById("s40").style.color = onLedColor;
   }
   if(seconds >= 35){
     document.getElementById("s35").style.color = onLedColor;
   }
   if(seconds >= 30){
     document.getElementById("s30").style.color = onLedColor;
   }
   if(seconds >= 25){
     document.getElementById("s25").style.color = onLedColor;
   }
   if(seconds >= 20){
     document.getElementById("s20").style.color = onLedColor;
   }
   if(seconds >= 15){
     document.getElementById("s15").style.color = onLedColor;
   }
   if(seconds >= 10){
     document.getElementById("s10").style.color = onLedColor;
   }
   if(seconds >= 5){
     document.getElementById("s5").style.color = onLedColor;
   }
 }

 /**
  * Resets the styles of the whole wordclock.
  */
 function resetSeconds(){
   for(var i = 5; i < 60; i += 5){
     document.getElementById("s"+i).style.color = ledColor;
   }
 }
});
