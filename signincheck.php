<?php

  require_once "connect/connect.php";

  $set = false;
  $email = $_POST['emailid'];
  $password = $_POST['password'];

  $result = $GLOBALS['db']->query("SELECT * FROM users WHERE emailid='$email'");
  $arr = $result->fetch_assoc();
  $noofrows = $result->num_rows;
  if($result)
  {
    if($password == $arr['password']) {
      $set = true;
    }
    else {
      $set = false;
    }
  }

  if($set)
  {
    $id = $arr['userid'];
    $eid = $arr['emailid'];
    $username = $arr['username'];
  }
  else {
    $id = null;
    $eid = null;
    $username = null;
  }
  $json = array('status' => $set, 'id'=> $id , 'eid' => $eid , 'uname' => $username);

  echo json_encode($json);
  $GLOBALS['db']->close();
?>
