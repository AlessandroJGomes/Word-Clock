<div class="float-menu">
  <div class="float-menu-icon">
    <i class="glyphicon glyphicon-menu-hamburger"></i>
  </div>
  <div class="float-menu-content">
    <h4><?php echo MENU_LANG ?></h4><hr>
    <div class="row text-center">
      <?php if(strtolower($GLOBALS['current_page']) != "it"){ ?>
      <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
        <a href="/it" class="btn btn-default"><?php echo MENU_ITALIAN ?></a>
      </div>
      <?php } ?>
      <?php if(strtolower($GLOBALS['current_page']) != "de"){ ?>
      <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
        <a href="/de" class="btn btn-default"><?php echo MENU_DEUTSCH ?></a>
      </div>
      <?php } ?>
      <?php if(strtolower($GLOBALS['current_page']) != "fr"){ ?>
      <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
        <a href="/fr" class="btn btn-default"><?php echo MENU_FRANCAIS ?></a>
      </div>
      <?php } ?>
    </div>
    <hr>
    <h4><?php echo MENU_THEMES ?></h4><hr>
    <div class="row">
      <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
        <a class="btn btn-theme1" onclick="changeColorLED('#212121', '#ABABAB', '#FF0000');"><?php echo MENU_THEME ?> 1</a>
      </div>
      <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
        <a class="btn btn-theme2" onclick="changeColorLED('#212121', '#FFC107', '#FF6F00');"><?php echo MENU_THEME ?> 2</a>
      </div>
      <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
        <a class="btn btn-theme3" onclick="changeColorLED('#EFEFEF', '#BCBCBC', '#000000');"><?php echo MENU_THEME ?> 3</a>
      </div>
    </div>
    <hr class="hidden-xs">
    <h4 class="hidden-xs"><?php echo MENU_CUSTOMCOLORS ?></h4><hr class="hidden-xs">
    <div class="row hidden-xs">
      <div class="col-md-4 col-lg-4 col-sm-4">
        <label class="dyn-text" for="1"><?php echo MENU_COLBG ?></label><br />
        <input class="jscolor" id="bgCol" class="form-control" value="212121">
      </div>
      <div class="col-md-4 col-lg-4 col-sm-4">
        <label for="2"><?php echo MENU_COLLEDOFF ?></label><br />
        <input class="jscolor" id="ledCol" class="form-control" value="ABABAB">
      </div>
      <div class="col-md-4 col-lg-4 col-sm-4">
        <label for="3"><?php echo MENU_COLLEDON ?></label><br />
        <input class="jscolor" id="onLedCol" class="form-control" value="FF0000">
      </div>
    </div>
    <br>
    <div class="row hidden-xs custom-colors">
      <div class="col-md-12 col-lg-12 col-sm-12 text-right">
        <a class="btn btn-info" id="customCol"><?php echo MENU_SAVE ?></a>
      </div>
    </div>

    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){ ?>
    <hr>
    <h4><?php echo MENU_MANAGELEDS ?></h4><hr>
    <div class="row">
      <div class="col-md-12 col-lg-12 text-center">
        <a class="btn btn-danger" onclick="manageLED();"><?php echo MENU_MANAGELEDS_BTN_ON ?></a>
        <a class="btn btn-default" onclick="location.reload();"><?php echo MENU_MANAGELEDS_BTN_OFF ?> (<i class="glyphicon glyphicon-refresh"></i>)</a>
      </div>
    </div><br>
    <?php } ?>
  </div>
</div>
