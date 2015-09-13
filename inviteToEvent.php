<?php

  require_once "connect/connect.php";

  $eventid = $_POST['eventid'];
  $adminid = $_POST['adminid'];
  $friendids = $_POST['friends'];//serialized using c# function. PHP Unserialize works same way ?
  //after $friendids becomes an array :
  //$friendids[] = $adminid;
  $status = true;

  foreach($friendids as $id){
    $result = $GLOBALS['db']->query("INSERT INTO eventparticipant values ('$eventid','$id') ");
    $status = $status and $result;
  }

  $json = array('status' => $status );
  echo json_encode($json);
  $GLOBALS['db']->close();

?>
