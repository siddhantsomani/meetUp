<?php
//Check for errors
  require_once "connect/connect.php";

  $type = $_POST['type'];
  $time_meet = $_POST['time_meet'];
  $place = $_POST['place'];
  $name = $_POST['name'];//GRT luncheonnn
  $uid = $_POST['uid'];//id of user who creates
  $extraNotice = $_POST['extraNotice'];//Whatever extra notice needs to be shown. Wear this dress or come here first etc etc

  if(!(isset($type) && isset($time_meet) && isset($place) && isset($name) && isset($uid)) ) {
    $result[] = false;
  }
  else {
    $result[] = $GLOBALS['db']->raw("INSERT INTO meetup (uid,name,type,place,timemeet,extranotice) VALUES ('$uid','$name','$type','$place','$time_meet','$extraNotice')");
  }

  echo json_encode($result);
 ?>
