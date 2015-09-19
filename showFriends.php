<?php
  require_once "connect/connect.php";
  //status 0 implies Already Friends
  $id = intval($_POST['userid']);

  $friendList = array();
  $friendnames = array();
  $friendemails = array();
  $nooffriends=0;
  $result = $GLOBALS['db']->query("SELECT id2,username,emailid FROM friends f,users u WHERE f.id1=".$id." and f.status=0 and f.id2=u.userid");
  $result1 = $GLOBALS['db']->query("SELECT id1,username,emailid FROM friends f,users u WHERE f.id2=".$id." and f.status=0 and f.id1=u.userid");
  while($row = $result->fetch_assoc()){
    $friendlist[] = $row['id2'];
    $friendnames[] = $row['username'];
    $friendemails[] = $row['emailid'];
    $nooffriends++;
  }
  while($row1 = $result1->fetch_assoc()){
    $friendlist[] = $row1['id1'];
    $friendnames[] = $row1['username'];
    $friendemails[] = $row['emailid'];
    $nooffriends++;
  }

  if($nooffriends>=1)
    $status = true;
  else
    $status = false;

  $json = array('status' => $status,'friendCount' => $nooffriends, 'id' => $friendlist, 'names' => $friendnames, 'email' => $friendemails);
  echo json_encode($json);
  $GLOBALS['db']->close();
?>
