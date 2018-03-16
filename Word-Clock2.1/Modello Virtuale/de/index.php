<?php
  require ("../classes/Auth.php");
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <?php $GLOBALS['current_page'] = "De";
          require '../inc/head.inc.php'; ?>
  </head>
  <body>
    <div class="container">
      <table id="table">
        <tr id="0">
          <td></td><td></td><td title="plus">+</td><td></td><td title="minus">-</td><td></td><td><span id="200" title="1 minute">&#8226</span></td><td></td><td><span id="210" title="2 minuten">&#8226</span></td><td></td><td><span id="220" title="3 minuten">&#8226</span></td><td></td><td><span id="230" title="4 minuten">&#8226</span></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr id="10">
          <td><span class="sec_point" id="s5"  title="5 sekunden">&#8226</span></td><td>E</td><td>S</td><td>K</td><td>I</td><td>S</td><td>T</td><td>L</td><td>F</td><td>Ü</td><td>N</td><td>F</td><td>U</td><td>N</td><td>A</td>
        </tr>
        <tr id="20">
          <td><span class="sec_point" id="s10"  title="10 sekunden">&#8226</span></td><td>Z</td><td>E</td><td>H</td><td>N</td><td>Z</td><td>W</td><td>A</td><td>N</td><td>Z</td><td>I</td><td>G</td><td>D</td><td>U</td><td>E</td>
        </tr>
        <tr id="30">
          <td><span class="sec_point" id="s15"  title="15 sekunden">&#8226</span></td><td>D</td><td>R</td><td>E</td><td>I</td><td>V</td><td>I</td><td>E</td><td>R</td><td>T</td><td>E</td><td>L</td><td>S</td><td>E</td><td>I</td>
        </tr>
        <tr id="40">
          <td><span class="sec_point" id="s20" title="20 sekunden">&#8226</span></td><td>T</td><td>G</td><td>N</td><td>A</td><td>C</td><td>H</td><td>V</td><td>O</td><td>R</td><td>J</td><td>M</td><td>T</td><td>T</td><td>E</td>
        </tr>
        <tr id="50">
          <td><span class="sec_point" id="s25"  title="25 sekunden">&#8226</span></td><td>H</td><td>A</td><td>L</td><td>B</td><td>Q</td><td>Z</td><td>W</td><td>Ö</td><td>L</td><td>F</td><td>S</td><td>A</td><td>I</td><td>A</td>
        </tr>
        <tr id="60">
          <td><span class="sec_point" id="s30"  title="30 sekunden">&#8226</span></td><td>Z</td><td>W</td><td>E</td><td>I</td><td>N</td><td>S</td><td>I</td><td>E</td><td>B</td><td>E</td><td>N</td><td>A</td><td>I</td><td>A</td>
        </tr>
        <tr id="70">
          <td><span class="sec_point" id="s35"  title="35 sekunden">&#8226</span></td><td>K</td><td>D</td><td>R</td><td>E</td><td>I</td><td>R</td><td>H</td><td>F</td><td>Ü</td><td>N</td><td>F</td><td>N</td><td>D</td><td>E</td>
        </tr>
        <tr id="80">
          <td><span class="sec_point" id="s40"  title="40 sekunden">&#8226</span><td>D</td><td>Z</td><td>W</td><td>A</td></td><td>M</td><td>I</td><td>T</td><td>T</td><td>A</td><td>G</td><td>N</td><td>Z</td><td>I</td><td>G</td>
        </tr>
        <tr id="90">
          <td><span class="sec_point" id="s45"  title="45 sekunden">&#8226</span></td><td>E</td><td>L</td><td>F</td><td>N</td><td>E</td><td>U</td><td>N</td><td>V</td><td>I</td><td>E</td><td>R</td><td>Q</td><td>U</td><td>E</td>
        </tr>
        <tr id="100">
          <td><span class="sec_point" id="s50"  title="50 sekunden">&#8226</span></td><td>W</td><td>A</td><td>C</td><td>H</td><td>T</td><td>Z</td><td>E</td><td>H</td><td>N</td><td>R</td><td>S</td><td>R</td><td>T</td><td>O</td>
        </tr>
        <tr id="110">
          <td><span class="sec_point" id="s55"  title="55 sekunden">&#8226</span></td><td>B</td><td>S</td><td>E</td><td>C</td><td>H</td><td>S</td><td>F</td><td>M</td><td>U</td><td>H</td><td>R</td><td>Z</td><td>Z</td><td>A</td>
        </tr>
        <tr id="120">
          <td><span class="sec_point" id="s60">&#8226</span></td><td>N</td><td>M</td><td>I</td><td>T</td><td>T</td><td>E</td><td>R</td><td>N</td><td>A</td><td>C</td><td>H</td><td>T</td><td>F</td><td>O</td>
        </tr>
      </table>

      <?php require '../inc/menu.inc.php';
            require '../inc/auth.inc.php'; ?>
    </div>
  </body>
</html>
