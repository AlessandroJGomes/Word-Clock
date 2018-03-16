<?php
  require ("../classes/Auth.php");
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php $GLOBALS['current_page'] = "Fr";
          require '../inc/head.inc.php'; ?>
  </head>
  <body>
    <div class="container">
      <table id="table">
        <tr id="0">
          <td></td><td></td><td title="plus">+</td><td></td><td title="moins">-</td><td></td><td><span id="200" title="1 minute">&#8226</span></td><td></td><td><span id="210" title="2 minutes">&#8226</span></td><td></td><td><span id="220" title="3 minutes">&#8226</span></td><td></td><td><span id="230" title="4 minutes">&#8226</span></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr id="10">
          <td><span class="sec_point" id="s5"  title="5 secondes">&#8226</span></td><td>I</td><td>L</td><td>A</td><td>E</td><td>S</td><td>T</td><td>B</td><td>D</td><td>E</td><td>U</td><td>X</td><td>A</td><td>X</td><td>A</td>
        </tr>
        <tr id="20">
          <td><span class="sec_point" id="s10"  title="10 secondes">&#8226</span></td><td>Q</td><td>U</td><td>A</td><td>T</td><td>R</td><td>E</td><td>D</td><td>C</td><td>I</td><td>N</td><td>Q</td><td>D</td><td>U</td><td>E</td>
        </tr>
        <tr id="30">
          <td><span class="sec_point" id="s15"  title="15 secondes">&#8226</span></td><td>S</td><td>I</td><td>X</td><td>N</td><td>E</td><td>U</td><td>F</td><td>O</td><td>N</td><td>Z</td><td>E</td><td>S</td><td>E</td><td>I</td>
        </tr>
        <tr id="40">
          <td><span class="sec_point" id="s20" title="20 secondes">&#8226</span></td><td>U</td><td>N</td><td>E</td><td>H</td><td>S</td><td>E</td><td>P</td><td>T</td><td>D</td><td>I</td><td>X</td><td>T</td><td>T</td><td>E</td>
        </tr>
        <tr id="50">
          <td><span class="sec_point" id="s25"  title="25 secondes">&#8226</span></td><td>H</td><td>U</td><td>I</td><td>T</td><td>E</td><td>T</td><td>R</td><td>O</td><td>I</td><td>S</td><td>Z</td><td>E</td><td>C</td><td>I</td>
        </tr>
        <tr id="60">
          <td><span class="sec_point" id="s30"  title="30 secondes">&#8226</span></td><td>U</td><td>M</td><td>I</td><td>D</td><td>I</td><td>H</td><td>E</td><td>U</td><td>R</td><td>E</td><td>S</td><td>A</td><td>I</td><td>A</td>
        </tr>
        <tr id="70">
          <td><span class="sec_point" id="s35"  title="35 secondes">&#8226</span></td><td>M</td><td>I</td><td>N</td><td>U</td><td>I</td><td>T</td><td>S</td><td>F</td><td>E</td><td>T</td><td>A</td><td>N</td><td>D</td><td>E</td>
        </tr>
        <tr id="80">
          <td><span class="sec_point" id="s40"  title="40 secondes">&#8226</span></td><td>M</td><td>O</td><td>I</td><td>N</td><td>S</td><td>O</td><td>V</td><td>I</td><td>N</td><td>G</td><td>T</td><td>E</td><td>X</td><td>D</td>
        </tr>
        <tr id="90">
          <td><span class="sec_point" id="s45"  title="45 secondes">&#8226</span></td><td>D</td><td>I</td><td>X</td><td>T</td><td>L</td><td>E</td><td>S</td><td>D</td><td>E</td><td>M</td><td>I</td><td>E</td><td>U</td><td>E</td>
        </tr>
        <tr id="100">
          <td><span class="sec_point" id="s50"  title="50 secondes">&#8226</span></td><td>Q</td><td>U</td><td>A</td><td>R</td><td>T</td><td>U</td><td>C</td><td>I</td><td>N</td><td>Q</td><td>O</td><td>R</td><td>T</td><td>O</td>
        </tr>
        <tr id="110">
          <td><span class="sec_point" id="s55"  title="55 secondes">&#8226</span></td><td>A</td><td>T</td><td>R</td><td>E</td><td>N</td><td>T</td><td>E</td><td>-</td><td>C</td><td>I</td><td>N</td><td>Q</td><td>Z</td><td>Z</td>
        </tr>
        <tr id="120">
          <td><span class="sec_point" id="s60">&#8226</span></td><td>N</td><td>D</td><td>V</td><td>I</td><td>N</td><td>G</td><td>T</td><td>-</td><td>C</td><td>I</td><td>N</td><td>Q</td><td>A</td><td>T</td>
        </tr>
      </table>

      <?php require '../inc/menu.inc.php';
            require '../inc/auth.inc.php'; ?>
    </div>
  </body>
</html>
