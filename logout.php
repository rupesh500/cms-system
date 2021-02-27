<?php ob_start(); ?>
<?php session_start();?>


<?php

      $_SESSION['db_username'] =  null;
      $_SESSION['db_password'] =  null;
      $_SESSION['db_user_firstname'] = null;
      $_SESSION['db_user_lastname'] = null;
     $_SESSION['db_user_role'] = null;
    
header("location:index.php");

?>




