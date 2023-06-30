<?php
  session_start();

  session_unset();
  session_destroy();


  header('Location: /via_uy/src/views/user/login.php');
  ?>