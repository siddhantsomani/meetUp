<?php

  require_once "connect/connect.php";

  $accepted = $_POST['accepted'];
  $rejected = $_POST['rejected'];
  $userid = intval($_POST['userid']);

  $accept = array();
  $reject = array();
  $accept = explode("a",$accepted);
  $reject = explode("a",$rejected);

  for($i=0;$i<count($accept);$i++){
    $result = $GLOBALS['db']->query("UPDATE friends SET status = 0 WHERE id1=".$accept[$i]." and id2=".$userid);
  }

  for($i=0;$i<count($reject);$i++){
    $result = $GLOBALS['db']->query("DELETE FROM friends WHERE id1=".$reject[$i]." and id2=".$userid);
  }


?>
