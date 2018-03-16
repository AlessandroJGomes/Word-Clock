<?php
  require ("../classes/Auth.php");
  $auth = new Auth();

  if($_SESSION['logged_in'] == 1){
    header("Location: /");
  }

  define('USERNAME_TEMP', $_POST['auth__username']);
  define('PASSWORD_TEMP', $_POST['auth__password']);
?>
<html>
  <head>
    <?php $GLOBALS['current_page'] = "Auth";
          require '../inc/head.inc.php'; ?>
  </head>
  <body>
    <div id="main__wrapper" class="mui-panel">
      <div id="title_auth">WordClock Auth</div>
      <hr>
      <?php
          if (isset($auth)) {
              if ($auth->errors) {
                  foreach ($auth->errors as $error) {
                      print '<div class="alert alert-danger">
                                  '.$error.'
                              </div>' ;
                  }
              }
              if ($auth->messages) {
                  foreach ($auth->messages as $message) {
                      print '<div class="alert alert-success">
                                '.$message.'
                            </div>' ;
                  }
              }
          }
      ?>
      <form method="post" class="mui-form" id="auth_form">
        <input type="hidden" name="auth_request"/>
        <div class="mui-textfield mui-textfield--float-label">
          <input type="text" name="auth__username" value="<?php echo USERNAME_TEMP; ?>" required="">
          <label>Username</label>
        </div>
        <div class="mui-textfield mui-textfield--float-label">
          <input type="password" name="auth__password" value="<?php echo PASSWORD_TEMP; ?>" required="">
          <label>Password</label>
        </div>
        <br>
        <button class="mui-btn mui-btn--primary" type="submit">Accedi</button>
      </form>
    </div>
  </body>
</html>
