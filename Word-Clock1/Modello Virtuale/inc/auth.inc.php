<div class="float-auth-menu">
  <?php if(!isset($_SESSION['logged_in'])){ ?>
  <div class="float-auth-menu-icon float-auth-menu-login">
    <a href="/auth"><i class="glyphicon glyphicon-log-in"></i></a>
  </div>
  <?php } else if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){ ?>
  <div class="float-auth-menu-icon float-auth-menu-setting">
    <a href="/settings"><i class="glyphicon glyphicon-user"></i></a>
  </div>
  <div class="float-auth-menu-icon float-auth-menu-logout">
    <a href="?logout"><i class="glyphicon glyphicon-log-out"></i></a>
  </div>
  <?php } ?>
</div>
