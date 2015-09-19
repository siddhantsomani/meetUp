<?php
  require_once 'connect/connect.php';
  $add=1;
  $aid = $GLOBALS['db']->query("SELECT username FROM users WHERE userid=".$add);
  $aid = $aid->fetch_assoc();
  //$adminname[] = $ad['username'];
  print_r($aid['username']);



  $GLOBALS['db']->close();
 ?>
