<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <?php
	session_start();
	session_unset();
	session_destroy();
        echo '<script language="javascript">window.location.href="Layout.php"</script>';
    ?>
    
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
