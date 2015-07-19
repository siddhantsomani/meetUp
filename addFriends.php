<?php
  require_once "connect/connect.php";
  $id1 = $_POST['friendId1']; //Send ids of the friends through post in the App
  $id2 = $_POST['friendId2'];
  if($id1==$id2){
    exit;
  }
  if($id1 < $id2){
    $temp = $id1;
    $id1 = $id2;
    $id2 = $temp;
  }
  //Insert lower ID Friend first (lexicographical ordering)
  //Try- catch : manage inserting error
  $query1 = $GLOBALS['db']->insert("friends",'id1, id2',"'$id1','$id2'");
  $query2 = $GLOBALS['db']->insert("friends",'id1, id2',"'$id2','$id1'");

  $result = array("id1" => $query1, "id2" => $query2);//$query1 , $query2;
  echo json_encode($result);
