<?php
//TRY FOR ERROR
  require_once "connect/connect.php";
  $id = $_POST['userid'];

  $friendList = array();

  $result = $GLOBALS['db']->raw("SELECT id2 FROM friends WHERE id1=".$id);
  while($row = $result->fetch_assoc()){
    $friendlist[] = $GLOBALS[db]->raw("SELECT * FROM users WHERE userid=".$row['id2']);
  }
  echo json_encode($friendlist);
