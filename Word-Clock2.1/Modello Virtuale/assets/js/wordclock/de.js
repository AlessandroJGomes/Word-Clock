/** ----------------------------------------- **\
 *  @file     WordClock German Version
 *
 *  @date     12.05.2017
 *  @author   Alessandro Narciso & Loris Bruno
\** ----------------------------------------- **/
var loop;
$(document).ready(function() {

  var hours, minutes, seconds;
  var on;
  var off;
  var toOrpast = false;
  var diff = 0;
  $(function() {change();});
  adapt();

  function getTime() {
    var now = new Date();
    hours = now.getHours();
    minutes = now.getMinutes();
    seconds = now.getSeconds();
  }

  window.change = function(){
    on = onLedColor;
    off = ledColor;

    loop = setTimeout(change, 500);
    reset();
    getTime();

    //Es ist on
    genWord(10, 0, 1, on);
    genWord(10, 3, 5, on);

    if(minutes < 40){
      toOrpast = false;
    } else {
      toOrpast = true;
      hours += 1;
    }

    if(minutes >= 25 && minutes < 40){
      hours += 1;
    }

    if(hours == 1 || hours == 13){
      genWord(60, 2, 4, on);
    } else if(hours == 2 || hours == 14){
      genWord(60, 0, 3, on);
    } else if(hours == 3 || hours == 15){
      genWord(70, 1, 4, on);
    } else if(hours == 4 || hours == 16){
      genWord(90, 7, 10, on);
    } else if(hours == 5 || hours == 17){
      genWord(70, 7, 10, on);
    } else if(hours == 6 || hours == 18){
      genWord(110, 1, 5, on);
    } else if(hours == 7 || hours == 19){
      genWord(60, 5, 10, on);
    } else if(hours == 8 || hours == 20){
      genWord(100, 1, 4, on);
    } else if(hours == 9 || hours == 21){
      genWord(90, 3, 6, on);
    } else if(hours == 10 || hours == 22){
      genWord(100, 5, 8, on);
    } else if(hours == 11 || hours == 23){
      genWord(90, 0, 2, on);
    } else if(hours == 12){
      genWord(80, 4, 9, on);
    } else if(hours == 00 || hours == 24){
      genWord(120, 1, 11, on);
    }
    //Illuminazione dei pallini
    diff = minutes - parseInt(minutes/10)*10;

    if(toOrpast == false) {
      if(diff != 0 && diff != 5) {
        genWord(0, 1, 1, on);  //+ on

        if(diff != 0 && diff != 5) {
          if (diff != 5 && diff != 0) {
            getMinutes(200, on);  // + 1 min
          }
          if (diff >= 2 && diff <= 4 || diff >= 7 && diff <= 9) {
            getMinutes(210, on);  // + 2 min
          }
          if (diff >= 3 && diff <= 4 || diff >= 8 && diff <= 9) {
            getMinutes(220, on);  // + 3 min
          }
          if (diff == 4 || diff == 9) {
            getMinutes(230, on);  // + 4 min
          }
        }
      }

      if(minutes >= 5){
        genWord(40, 2, 5, on);  // nach
      }
      if(minutes < 5){
        if(hours != 12 && hours != 24 && hours != 00){
          genWord(110, 8, 10, on); // Uhr
        }
      } else if(minutes < 10){
        genWord(10, 7, 10, on);   //fünf on
      } else if (minutes < 15){
        genWord(20, 0, 3, on);
      } else if(minutes < 20){
        genWord(30, 4, 10, on);
      } else if(minutes < 25){
        genWord(20, 4, 10, on);   //Zwanzig on
      } else if(minutes < 30){
        genWord(40, 2, 5, off);  // nach off
        genWord(10, 7, 10, on);  //fünf on
        genWord(40, 6, 8, on); //vor on
        genWord(50, 0, 3, on); //halb on
      } else if(minutes < 35){
        genWord(40, 2, 5, off);  // nach off
        genWord(50, 0, 3, on);  //30 on
      } else if(minutes < 40){
        genWord(10, 7, 10, on);  //fünf on
        genWord(50, 0, 3, on); //halb on
      } else {
        genWord(100, 6, 10, on);  //Half on
      }
    } else {
      if(diff != 0 && diff != 5) {
        genWord(0, 3, 3, on);   // Accendo il -
        if (diff == 2 || diff == 7) {
          getMinutes(210, on);
          getMinutes(200, on);
          getMinutes(220, on);
        } else if (diff == 3 || diff == 8) {
          getMinutes(210, on);
          getMinutes(200, on);
        } else if (diff == 4 || diff == 9) {
          getMinutes(200, on);
        } else if (diff == 1 || diff == 6) {
          getMinutes(230, on);
          getMinutes(200, on);
          getMinutes(220, on);
          getMinutes(210, on);
        }
      }
      if(minutes <= 55){
        genWord(40, 6, 8, on); //vor on
      }
      if(minutes > 55){
        if(hours != 12 && hours != 24 && hours != 00){
          genWord(110, 8, 10, on); // Uhr
        }
      } else if(minutes > 50){
        genWord(10, 7, 10, on);   //fünf on
      } else if(minutes > 45){
        genWord(20, 0, 3, on);
      } else if(minutes > 40){
        genWord(30, 4, 10, on);
      } else if(minutes == 40){
        genWord(20, 4, 10, on);   //Zwanzig on
      }
    }
    // Non è un easter egg
    if((hours == 4 || hours == 16) && minutes == 20){
      genWord(50, 10, 13, on);
    }
  }

  function reset() {
    for(var x = 0; x <= 120; x += 10){
      var els = document.getElementById(x).getElementsByTagName("td");
      for(var y = 0; y <= 14; y++){
        els[y].style.color = off;
        els[y].style.textShadow = "";
      }
    }

    for(var x = 200; x <= 230; x+=10){
      getMinutes(x, off);
    }
  }

  function genWord(id, min, max, color) {
    min += 1;
    max += 1;
    var els = document.getElementById(id).getElementsByTagName("td");
    for(var x = min; x <= max; x++){
      els[x].style.color = color;
      if(color == on) els[x].style.textShadow = "0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)";
      if(color == off) els[x].style.textShadow = "";
    }
  }

  function getMinutes(id, color) {
    var els = document.getElementById(id);
    els.style.color = color;
  }

  function adapt(){
    var windowX = $(".container").width();
    var windowY = $(".container").height();
    if(windowX < windowY){
      $("#table").width(windowX);
      $("#table").height(windowX);

    } else {
      $("#table").width(windowY);
      $("#table").height(windowY);
    }
  }
});

window.onresize = function(event) {
  var windowX = $(".container").width();
  var windowY = $(".container").height();
  if(windowX < windowY){
    $("#table").width(windowX);
    $("#table").height(windowX);
  } else {
    $("#table").width(windowY);
    $("#table").height(windowY);
  }
};


function stop(){
  console.log("stop");
  clearTimeout(loop);
  stopS();
}

function start(){
  console.log("start");
  change();
  secStart();
}
