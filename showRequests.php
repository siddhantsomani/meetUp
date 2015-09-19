<?php
  require_once "connect/connect.php";

  $userid = intval($_POST['userid']);
  $name = array();
  $id = array();
  $email = array();
  $result = $GLOBALS['db']->query("SELECT * FROM friends f,users u where f.id2=".$userid." and f.id1=u.userid and f.status=1");
  while($temp = $result->fetch_assoc())
  {
    $id[] = intval($temp['id1']);
    $email[] = $temp['emailid'];
    $name[] = $temp['username'];
  }

  if($result->num_rows)
    $status = true;
  else {
    $status = false;
  }

  $json = array('status' => $status, 'id' => $id, 'email' => $email, 'name' => $name );
  echo json_encode($json);

 ?>
