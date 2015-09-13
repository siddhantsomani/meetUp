<?php
  require_once "connect/connect.php";

  $id = $_POST['userid'];

  $friendList = array();
  $nooffriends=0;
  $result = $GLOBALS['db']->query("SELECT id2 FROM friends WHERE id1=".$id." and status=0");
  $result1 = $GLOBALS['db']->query("SELECT id1 FROM friends WHERE id2=".$id." and status=0");
  while($row = $result->fetch_assoc()){
    $friendlist[] = $row['id2'];
    $nooffriends++;
  }
  while($row = $result1->fetch_assoc()){
    $friendlist[] = $row['id1'];
    $nooffriends++;
  }

  $status = $result and $result1;
  $json = array('status' => $status,'friendCount' => $nooffriends, 'id' => $friendlist);
  echo json_encode($json);
  $GLOBALS['db']->close();
?>
