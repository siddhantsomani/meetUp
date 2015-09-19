<?php

  require_once "connect/connect.php";

  $eventid = intval($_POST["eventid"]);
  $result = $GLOBALS['db']->query("SELECT emailid,userid,username FROM users u,eventparticipant e WHERE u.userid = e.friendid AND e.eventid =".$eventid);

  $ids=array();
  $friendname = array();
  $emails = array();
  while($temp = $result->fetch_assoc())
  {
    $ids[] = $temp['userid'];
    $friendname[] = $temp['username'];
    $emails[] = $temp['emailid'];
  }

  $json = array('id' => $ids, 'username' => $friendname, 'emailid' => $emails);
  echo json_encode($json);
 ?>
