  <?php
    require_once 'connect/connect.php';

    $number = 0;
    $name = $_POST["searchstring"];
    $name = trim($name);
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
    $json = array('status' => $status, 'noofrecords' => $number, 'ids' => $friendid, 'names' => $username);
    echo json_encode($json);
    $GLOBALS['db']->close();
  ?>
