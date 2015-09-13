<?php

  require_once "connect/connect.php";

  $userid = $_POST['userid'];

  $res = $GLOBALS['db']->query("SELECT * FROM eventparticipant WHERE friendid =".$userid);

  foreach($res->fetch_assoc() as $temp)
    $result[] = $GLOBALS['db']->query("SELECT * FROM events WHERE eventid=$temp['eventid']");

  ?>
