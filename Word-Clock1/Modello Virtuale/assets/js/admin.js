/** ----------------------------------------- **\
 *  @file     Admin System
 *
 *  @date     12.05.2017
 *  @author   Alessandro Narciso & Loris Bruno
\** ----------------------------------------- **/

/**
 * LED Manager.
 */
var startedManagerLED = false;

/**
 * Manage the admin panel for the sync with the real model.
 */
function manageLED(){
  // Checks if the manager has been already started.
  if(!startedManagerLED){
    // Gets through all the rows.
    for(var x = 0; x <= 120; x += 10){
      // Saves the reference for the row.
      var els = document.getElementById(x).getElementsByTagName("td");
      // Gets through all the columns.
      for(var y = 0; y < 14; y++){
        // Saves the reference for the column.
        var dum = els[y].innerHTML;
        // Binds the coordinates to each element needed for the sync.
        els[y].innerHTML = "<a data-pos='"+((x/10)+1)+","+(y+1)+"'>" + dum + "</a>";
      }
    }

    // Sets to true the manager. It is now started.
    startedManagerLED = true;
  }
}

/**
 * Document Ready (main)
 */
$(document).ready(function() {
  $("td").click(function() {
    // Takes the data-pos (coordinate) of the element.
    var data = $(this).children().attr("data-pos");
    // For some browsers, `attr` is undefined; for others, `attr` is false. Checks for both.
    if (typeof data !== typeof undefined && data !== false) {
      // Splits the string for get the position
      var pos = data.split(",");
      // Calls the stop function for the seconds
      stopS();
      // Turns on the LED selected
      $(function() {genWord(pos[0]*10, pos[1], pos[1]+1, on);});
    }
  });
});
