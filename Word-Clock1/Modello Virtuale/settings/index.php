<?php
  require ("../classes/Auth.php");
  $auth = new Auth();

  if($_SESSION['logged_in'] == 0){
    header("Location: /auth");
  }

?>
<html>
  <head>
    <?php $GLOBALS['current_page'] = "Settings";
          require '../inc/head.inc.php'; ?>
  </head>
  <body>
    <div id="main__wrapper" class="mui-panel">
      <div id="title_auth">Settings</div>
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
      <form method="post" class="mui-form" id="settings_form">
        <h3>Change password</h3>
        <input type="hidden" name="settings_request"/>
        <div class="mui-textfield mui-textfield--float-label">
          <input type="password" name="settings__curpassword" required="">
          <label>Current Password</label>
        </div>
        <div class="mui-textfield mui-textfield--float-label">
          <input type="password" name="settings__newpassword" required="">
          <label>New Password</label>
        </div>
        <div class="mui-textfield mui-textfield--float-label">
          <input type="password" name="settings__repassword" required="">
          <label>Re-type New Password</label>
        </div>
        <br>
        <button class="mui-btn mui-btn--primary" style="float:right" type="submit">Save</button>
      </form>
    </div>
  </body>
</html>
