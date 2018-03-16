/** ----------------------------------------- **\
 *  @file     WordClock Italian Version
 *
 *  @date     12.05.2017
 *  @author   Alessandro Narciso & Loris Bruno
\** ----------------------------------------- **/

$(document).ready(function() {
  $(function() {change();});

  window.change = function(){
    on = onLedColor;
    off = ledColor;

    localTimeClock = setTimeout(change, 500);
    reset();
    getTime();

    //Sono le ore
    if(hours != 1 && hours != 13 && hours != 12 && hours != 24 || (minutes >= 35)) {
      genWord(10, 1, 4, on);
      genWord(10, 6, 7, on);
    }

    if(minutes < 40){
      toOrpast = false;
    } else {
      toOrpast = true;
      hours += 1;
    }

    if(hours == 1 || hours == 13){
      genWord(10, 0, 0, on);
      genWord(10, 9, 13, on);
      genWord(10, 1, 4, off);//sono le off
      genWord(10, 6, 7, off);//sono le off
    } else if(hours == 2 || hours == 14){
      genWord(20, 11, 13, on);
    } else if(hours == 3 || hours == 15){
      genWord(30, 0, 2, on);
    } else if(hours == 4 || hours == 16){
      genWord(30, 4, 10, on);
    } else if(hours == 5 || hours == 17){
      genWord(40, 0, 5, on);
    } else if(hours == 6 || hours == 18){
      genWord(30, 11, 13, on);
    } else if(hours == 7 || hours == 19){
      genWord(40, 9, 13, on);
    } else if(hours == 8 || hours == 20){
      genWord(50, 0, 3, on);
    } else if(hours == 9 || hours == 21){
      genWord(50, 4, 7, on);
    } else if(hours == 10 || hours == 22){
      genWord(50, 9, 13, on);
    } else if(hours == 11 || hours == 23){
      genWord(60, 0, 5, on);
    } else if(hours == 12){
      genWord(10, 0, 0, on);
      genWord(20, 0, 10, on);
      genWord(10, 1, 4, off);//sono le off
      genWord(10, 6, 7, off);//sono le off
    } else if(hours == 00 || hours == 24){
      genWord(10, 0, 0, on);
      genWord(70, 0, 9, on);
      genWord(10, 1, 4, off);//sono le off
      genWord(10, 6, 7, off);//sono le off
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
        genWord(70, 13, 13, on);  // E
      }
      if(minutes < 5){
      } else if(minutes < 10){
        genWord(90, 8, 13, on);   //Five on
      } else if (minutes < 15){
        genWord(100, 0, 4, on);
      } else if(minutes < 20){
        genWord(100, 5, 6, on);
        genWord(100, 8, 13, on);
      } else if(minutes < 25){
        genWord(110, 0, 4, on);   //Twenty on
      } else if(minutes < 30){
        genWord(120, 3, 13, on);  //25 on
      } else if(minutes < 35){
        genWord(120, 3, 13, off); //25 off
        genWord(110, 9, 13, on);  //30 on
      } else if(minutes < 40){
        genWord(80, 0, 11, on);   //35 on
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
        genWord(90, 0, 3, on);  // meno
      }
      if(minutes > 55){
      } else if(minutes > 50){
          genWord(90, 8, 13, on); //Five on
      } else if(minutes > 45){
          genWord(100, 0, 4, on);
      } else if(minutes > 40){
        genWord(100, 5, 6, on);
        genWord(100, 8, 13, on);
      } else if(minutes == 40){
        genWord(110, 0, 4, on);
      }
    }
    // Non è un easter egg
    if((hours == 4 || hours == 16) && minutes == 20){
      genWord(60, 10, 13, on);
    }
  }
});
