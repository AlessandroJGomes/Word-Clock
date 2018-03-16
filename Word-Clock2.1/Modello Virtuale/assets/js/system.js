/** ----------------------------------------- **\
 *  @file     Global Javascript System
 *
 *  @date     12.05.2017
 *  @author   Alessandro Narciso & Loris Bruno
\** ----------------------------------------- **/

/**
 * Global Color variables.
 */
var bgColor, ledColor, onLedColor;
/**
 * Global Time variables.
 */
var hours, minutes, seconds;
/**
 * Global ON LED variable.
 */
var on;
/**
 * Global OFF LED variable.
 */
var off;
/**
 * Global ? variable.
 */
var toOrpast = false;
/**
 * Global difference variable.
 */
var diff = 0;
/**
 * Global local time clock.
 */
var localTimeClock;
/**
 * Global local interval of seconds.
 */
var localSecondsInterval;

/**
 * Create a cookie.
 *
 * @see {@link http://stackoverflow.com/a/24103596}
 */
function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

/**
 * Read a cookie.
 *
 * @see {@link http://stackoverflow.com/a/24103596}
 */
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

/**
 * Erase a cookie.
 *
 * @see {@link http://stackoverflow.com/a/24103596}
 */
function eraseCookie(name) {
    createCookie(name,"",-1);
}

/**
 * Changes the LED colors.
 *
 * @param {string} bgCol Color of the background
 * @param {string} ledCol Color of the leds turned off
 * @param {string} onLedCol Color of the leds turned on
 */
function changeColorLED(bgCol = "#212121", ledCol = "#ABABAB", onLedCol = "#FF0000") {
    // Returns false if colors are equals.
    if(bgCol == ledCol || ledCol == onLedCol || onLedCol == bgCol){
      return false;
    }

    // Sets the background color.
    $(".container").css("backgroundColor", bgCol);

    // Defines the global color variables.
    bgColor = bgCol;
    ledColor = ledCol;
    onLedColor = onLedCol;
}

/**
 * Resets the styles of the whole wordclock.
 */
function reset() {
  // Gets through all the rows.
  for(var x = 0; x <= 120; x += 10){
    // Saves the reference for the row.
    var els = document.getElementById(x).getElementsByTagName("td");
    // Gets through all the columns.
    for(var y = 0; y <= 14; y++){
      // Sets the style to off.
      els[y].style.color = off;
      els[y].style.textShadow = "";
    }
  }

  // Gets through all the columns for the minutes.
  for(var x = 200; x <= 230; x+=10){
    // Turns off the LED of the minute.
    getMinutes(x, off);
  }
}

/**
 * Turns on the LEDs for the word.
 *
 * @param {int} id ID of the row
 * @param {int} min Minimum ID for the column
 * @param {int} max Maximum ID for the column
 * @param {var} color Color for turn on the LED
 */
function genWord(id, min, max, color) {
  // Saves the reference for the row.
  var els = document.getElementById(id).getElementsByTagName("td");
  // Gets through all the columns from the min and the max.
  for(var x = min+1; x <= max+1; x++){
    // Sets the style to the LEDs to turn on.
    els[x].style.color = color;
    if(color == on) els[x].style.textShadow = "0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)";
    if(color == off) els[x].style.textShadow = "";
  }
}

/**
 * Turns on the LEDs for the minutes.
 *
 * @param {int} id ID of the row
 * @param {var} color Color for turn on the LED
 */
function getMinutes(id, color) {
  // Saves the reference for the ID.
  var els = document.getElementById(id);
  // Sets the style to the LEDs to turn on.
  els.style.color = color;
}

/**
 * Gets the current time.
 */
function getTime() {
  // Takes the current date.
  var now = new Date();
  // Extracts the hours, the minutes and the seconds.
  hours   = now.getHours();
  minutes = now.getMinutes();
  seconds = now.getSeconds();
}

/**
 * Adapts the content based on the window size.
 */
function adapt(){
  // Sets the width of the container.
  var windowX = $(".container").width();
  // Sets the height of the container.
  var windowY = $(".container").height();
  // If the width is greater than the height,
  // it resize itself based on the width.
  if(windowX < windowY){
    $("#table").width(windowX);
    $("#table").height(windowX);

  // If the width is lower than the height,
  // it resize itself based on the height.
  } else {
    $("#table").width(windowY);
    $("#table").height(windowY);
  }
}

/**
 * Binds to the resize of the window, the function for adapt the content.
 */
window.onresize = function(event) {
  // Calls the adapt function.
  adapt();
};

/**
 * Stops the seconds.
 */
function stopS(){
 // Stops the local seconds interval.
 clearInterval(localSecondsInterval);
 // Resets the local seconds interval.
 localSecondsInterval = null;
}

/**
 * Stops the whole WordClock.
 */
function stop(){
  // Stops the local clock.
  clearTimeout(localTimeClock);
  // Calls the function that stops the seconds.
  stopS();
}

/**
 * Starts the whole WordClock.
 */
function start(){
  // Refresh the WordClock.
  change();
  // Starts the seconds.
  startSeconds();
}

/**
 * Document Ready (main)
 */
$(document).ready(function() {
  $(".float-menu-icon").click(function() {
    $(".float-menu-content").toggleClass("float-menu-content-opened");
    $(".float-menu-icon").toggleClass("float-menu-icon-opened");
    if($(".float-menu-content").hasClass("float-menu-content-opened")){
      $(".float-menu-icon > i").removeClass("glyphicon-menu-hamburger");
      $(".float-menu-icon > i").addClass("glyphicon-remove");
    } else {
      $(".float-menu-icon > i").removeClass("glyphicon-remove");
      $(".float-menu-icon > i").addClass("glyphicon-menu-hamburger");
    }
  });

  $("#customCol").click(function() {
    changeColorLED("#"+$('#bgCol').val(), "#"+$('#ledCol').val(), "#"+$('#onLedCol').val());
  });

  changeColorLED();

  adapt();
});
