<?php

  require_once "connect/connect.php";

  $userid = intval($_POST['userid']);
  $no=0;
  $result = $GLOBALS['db']->query("SELECT * FROM eventparticipant WHERE friendid =".$userid);
  $eventname = array();
  $eventtype = array();
  $eventid = array();
  $eventdate = array();
  $eventbudget = array();
  $eventtime = array();
  $adminname = array();
  $eventplace = array();
  $noofpeople = array();
  $extranotice = array();
  while ($temp = $result->fetch_assoc() ){
    $no++;
    $eventid[] = intval($temp['eventid']);
    $eve = $GLOBALS['db']->query("SELECT * FROM events WHERE id=".$temp['eventid']);
    $t = $eve->fetch_assoc();
    $eventtype[] = intval($t['eventtype']);
    $eventname[] = $t['name'];
    $eventplace[] = $t['place'];
    $eventdate[] = $t['eventdate'];
    $add = intval($t['adminid']);
    $aid = $GLOBALS['db']->query("SELECT username FROM users WHERE userid=".$add);
    $aid = $aid->fetch_assoc();
    $adminname[] = $aid['username'];
    $eventtime[] = $t['eventtime'];
    $eventbudget[] = $t['budget'];
    $noofpeople[] = $t['people'];
    $extranotice[] = $t['extranotice'];
    //Add field values as per requirement
  }
  if($no)
    $status = true;
  else {
    $status = false;
  }

  $json = array('status' => $status, 'id' => $eventid, 'type' => $eventtype, 'name' => $eventname, 'eventdate' => $eventdate, 'eventtime' => $eventtime, 'budget' => $eventbudget,'admins' => $adminname, 'noofpeople' => $noofpeople,  'extranotice' => $extranotice, 'number' => $noofpeople
);
  echo json_encode($json);


  ?>
