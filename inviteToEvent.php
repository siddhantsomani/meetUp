<?php

  require_once "connect/connect.php";

  $eventid = intval($_POST['eventid']);
  $adminid = intval($_POST['adminid']);
  $friends = $_POST['friends'];

  $friendids = array();

  $friendids = explode("a",$friends);
  $friendids[] = $adminid;

  $status = false;
  foreach($friendids as $id) {
	 $id2= intval($id);
	 if($id2!=0)
    $result = $GLOBALS['db']->query("INSERT INTO eventparticipant(eventid,friendid) values ('$eventid','$id2') ");

    if($result == true)
    $status = true;
  }

  $json = array('status' => $status );
  echo json_encode($status);
  $GLOBALS['db']->close();

?>
