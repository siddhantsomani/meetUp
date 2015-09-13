<?php
  require_once 'connect/connect.php';

  $number = 0;
  $name = $_POST["searchstring"];
  $friendid = array();
  $username = array();
  $result = false;
  if($name!="")
  {
     $result = $GLOBALS['db']->query("SELECT * FROM users where username like '%".$name."' or username like '".$name."%'");
      while($row = $result->fetch_assoc())
      {
        $friendid[] = $row['userid'];
        $username[] = $row['username'];
        $number++;
      }
  }
  if($result)
    $status = true;
  else
    $status = false;
  //$json = array('status' => $status, 'noofrecords' => $number, 'ids' => $friendid, 'names' => $username);
  //echo json_encode($json);






    $str = serialize($friendid);
    $strenc = urlencode($str);
    echo json_encode($str);
    echo "<br><br>";
    echo json_encode($strenc);
    $GLOBALS['db']->close();
 ?>
