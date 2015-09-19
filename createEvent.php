<?php
  require_once "connect/connect.php";

  $eventtype = $_POST['eventtype']; //1-movie 2-outing 3-restaurant
  $adminid = $_POST['adminid'];//id of user who creates event
  $name = $_POST['name'];//ABCD's bday
  $eventdate = $_POST['eventdate'];
  $eventtime = $_POST['eventtime'];
  $place = $_POST['place'];
  $budget = $_POST['budget'];
  $people = $_POST['noofpeople'];
  $extraNotice = $_POST['extranotice'];

  $result = $GLOBALS['db']->query("INSERT INTO events (eventtype,adminid,name,eventdate,eventtime,place,budget,people,extranotice) VALUES ('$eventtype','$adminid','$name','$eventdate','$eventtime','$place','$budget','$people','$extraNotice')");
  $result = $GLOBALS['db']->query("SELECT max(id) as id FROM events");
  $temp = $result->fetch_assoc();
  $id = $temp['id'];

  $json = array('eventid' => intval($id));
  echo json_encode($json);
  $GLOBALS['db']->close();
 ?>
