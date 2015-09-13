<?php
  require_once "connect/connect.php";


  $username = $_POST['username'];
  $emailid = $_POST['emailid'];
  $mobno = $_POST['mobno'];
  $pass = $_POST['password'];


  $result = $GLOBALS['db']->query("INSERT INTO users(username,emailid,password,mobno) values ('$username','$emailid','$pass','$mobno')");

  $json = array('status' => $result );
  echo json_encode($json);

  $GLOBALS['db']->close();
 ?>
