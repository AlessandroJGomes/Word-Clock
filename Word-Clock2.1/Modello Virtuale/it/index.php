<?php
  require ("../classes/Auth.php");
  $auth = new Auth();
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <?php $GLOBALS['current_page'] = "It";
          require '../inc/head.inc.php'; ?>
  </head>
  <body>
    <div class="container">
      <table id="table">
        <tr id="0">
          <td></td><td></td><td title="più">+</td><td></td><td title="meno">-</td><td></td><td><span id="200" title="1 minuto">&#8226</span></td><td></td><td><span id="210" title="2 minuti">&#8226</span></td><td></td><td><span id="220" title="3 minuti">&#8226</span></td><td></td><td><span id="230" title="4 minuti">&#8226</span></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr id="10">
          <td><span class="sec_point" id="s5"  title="5 secondi">&#8226</span></td><td>È</td><td>S</td><td>O</td><td>N</td><td>O</td><td>T</td><td>L</td><td>E</td><td>I</td><td>L</td><td>'</td><td>U</td><td>N</td><td>A</td>
        </tr>
        <tr id="20">
          <td><span class="sec_point" id="s10"  title="10 secondi">&#8226</span></td><td>M</td><td>E</td><td>Z</td><td>Z</td><td>O</td><td>G</td><td>I</td><td>O</td><td>R</td><td>N</td><td>O</td><td>D</td><td>U</td><td>E</td>
        </tr>
        <tr id="30">
          <td><span class="sec_point" id="s15"  title="15 secondi">&#8226</span></td><td>T</td><td>R</td><td>E</td><td>M</td><td>Q</td><td>U</td><td>A</td><td>T</td><td>T</td><td>R</td><td>O</td><td>S</td><td>E</td><td>I</td>
        </tr>
        <tr id="40">
          <td><span class="sec_point" id="s20" title="20 secondi">&#8226</span></td><td>C</td><td>I</td><td>N</td><td>Q</td><td>U</td><td>E</td><td>E</td><td>A</td><td>N</td><td>S</td><td>E</td><td>T</td><td>T</td><td>E</td>
        </tr>
        <tr id="50">
          <td><span class="sec_point" id="s25"  title="25 secondi">&#8226</span></td><td>O</td><td>T</td><td>T</td><td>O</td><td>N</td><td>O</td><td>V</td><td>E</td><td>D</td><td>D</td><td>I</td><td>E</td><td>C</td><td>I</td>
        </tr>
        <tr id="60">
          <td><span class="sec_point" id="s30"  title="30 secondi">&#8226</span></td><td>U</td><td>N</td><td>D</td><td>I</td><td>C</td><td>I</td><td>D</td><td>A</td><td>T</td><td>E</td><td>S</td><td>A</td><td>I</td><td>A</td>
        </tr>
        <tr id="70">
          <td><span class="sec_point" id="s35"  title="35 secondi">&#8226</span></td><td>M</td><td>E</td><td>Z</td><td>Z</td><td>A</td><td>N</td><td>O</td><td>T</td><td>T</td><td>E</td><td>A</td><td>N</td><td>D</td><td>E</td>
        </tr>
        <tr id="80">
          <td><span class="sec_point" id="s40"  title="40 secondi">&#8226</span></td><td>T</td><td>R</td><td>E</td><td>N</td><td>T</td><td>A</td><td>C</td><td>I</td><td>N</td><td>Q</td><td>U</td><td>E</td><td>X</td><td>D</td>
        </tr>
        <tr id="90">
          <td><span class="sec_point" id="s45"  title="45 secondi">&#8226</span></td><td>M</td><td>E</td><td>N</td><td>O</td><td>D</td><td>A</td><td>T</td><td>E</td><td>C</td><td>I</td><td>N</td><td>Q</td><td>U</td><td>E</td>
        </tr>
        <tr id="100">
          <td><span class="sec_point" id="s50"  title="50 secondi">&#8226</span></td><td>D</td><td>I</td><td>E</td><td>C</td><td>I</td><td>U</td><td>N</td><td>T</td><td>Q</td><td>U</td><td>A</td><td>R</td><td>T</td><td>O</td>
        </tr>
        <tr id="110">
          <td><span class="sec_point" id="s55"  title="55 secondi">&#8226</span></td><td>V</td><td>E</td><td>N</td><td>T</td><td>I</td><td>I</td><td>M</td><td>E</td><td>A</td><td>M</td><td>E</td><td>Z</td><td>Z</td><td>A</td>
        </tr>
        <tr id="120">
          <td><span class="sec_point" id="s60">&#8226</span></td><td>N</td><td>D</td><td>D</td><td>V</td><td>E</td><td>N</td><td>T</td><td>I</td><td>C</td><td>I</td><td>N</td><td>Q</td><td>U</td><td>E</td>
        </tr>
      </table>

      <?php require '../inc/menu.inc.php';
            require '../inc/auth.inc.php'; ?>
    </div>
  </body>
</html>
