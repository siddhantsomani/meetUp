<?php
  require_once "connect/connect.php";

  $friend = $_POST['friend'];
  $user = $_POST['user'];
  $status = 1;
  $result = $GLOBALS['db']->query("insert into friends(id1,id2,status) values ('$friend','$user','$status')");
  $json = array('status' => $result );
  echo json_encode($json);
  $GLOBALS['db']->close();
 ?>
