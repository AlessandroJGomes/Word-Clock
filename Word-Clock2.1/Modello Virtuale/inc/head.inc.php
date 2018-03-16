<meta charset="UTF-8">
    <meta name="description" content="Responsive word clock with multiple languages">
    <meta name="keywords" content="Word clock responsive javascript">
    <title>WordClock - <?php echo $GLOBALS['current_page']; ?></title>
<?php if(strtolower($GLOBALS['current_page']) == "auth" || strtolower($GLOBALS['current_page']) == "settings"){ ?>
    <link rel="stylesheet" href="/assets/lib/mui/css/mui.min.css" type="text/css"/>
    <script src="/assets/lib/mui/js/mui.min.js"></script>
    <link rel="stylesheet" href="/assets/css/auth.css" type="text/css">
<?php } else { ?>
    <!-- Style -->
    <link rel="stylesheet" href="/assets/lib/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/clock.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/menu.css" type="text/css">
    <!-- Script -->
    <script src="/assets/lib/jQuery/jquery-3.1.1.min.js"></script>
    <script src="/assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/lib/jscolor/jscolor.min.js"></script>
<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){ ?>
    <script src="/assets/js/admin.js"></script>
<?php } ?>
    <script src="/assets/js/seconds.js"></script>
<?php if(strtolower($GLOBALS['current_page']) == "it"){
      require '../translations/it.php';
?>
    <script src="/assets/js/wordclock/it.js"></script>
<?php } else if(strtolower($GLOBALS['current_page']) == "de"){
      require '../translations/de.php';
?>
    <script src="/assets/js/wordclock/de.js"></script>
<?php } else if(strtolower($GLOBALS['current_page']) == "fr"){
      require '../translations/fr.php';
?>
    <script src="/assets/js/wordclock/fr.js"></script>
<?php } ?>
    <script src="/assets/js/system.js"></script>
<?php } ?>
